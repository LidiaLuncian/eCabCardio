<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class MedicalLetterTable{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getMedicalLetter($id)
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

    public function saveMedicalLetter(MedicalLetter $medicalLetter)
    {
        $data = [
            'idUser' => $medicalLetter->idUser,
            'idConsult'  => $medicalLetter->idConsult,
            'observations'  => $medicalLetter->observations,
        ];

        $id = (int) $medicalLetter->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getMedicalLetter($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update medical letter with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteMedicalLetter($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}