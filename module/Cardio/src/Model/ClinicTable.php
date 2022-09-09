<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class ClinicTable{
    private $tableGateway;
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getClinic($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveClinic(Clinic $clinic)
    {
        $data = [
            'name' => $clinic->name,
            'logo'  => $clinic->logo,
            'address'  => $clinic->address,
            'phone'  => $clinic->phone,
            'zip'  => $clinic->zip,
            'bankAccount'  => $clinic->bankAccount,
        ];

        $id = (int) $clinic->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getClinic($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update clinic with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteClinic($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}