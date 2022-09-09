<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class ExaminationListTable{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getExaminationList($id)
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

    public function saveExaminationList(ExaminationList $examinationList)
    {
        $data = [
            'name' => $examinationList->name,
            'price'  => $examinationList->price,
            'idConsult'  => $examinationList->idConsult,
            'idExamination'  => $examinationList->idExamination,

        ];

        $id = (int) $examinationList->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getExaminationList($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update examination list with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteExaminationList($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}