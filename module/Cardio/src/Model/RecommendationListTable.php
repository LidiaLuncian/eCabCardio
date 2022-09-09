<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class RecommendationListTable{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getRecommendationList($id)
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

    public function saveRecommendationList(RecommendationList $recommendationList)
    {
        $data = [
            'name' => $recommendationList->name,
            'idConsult' => $recommendationList->idConsult,
            'idRecommendation' => $recommendationList->idRecommendation,
        ];

        $id = (int) $recommendationList->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getRecommendationList($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update recommendation with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteRecommendationList($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}