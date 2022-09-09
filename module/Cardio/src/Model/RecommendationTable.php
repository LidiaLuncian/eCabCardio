<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class RecommendationTable{

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getRecommendation($id)
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

    public function saveRecommendation(Recommendation $recommendation)
    {
        $data = [
            'name' => $recommendation->name,
        ];

        $id = (int) $recommendation->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getRecommendation($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update recommendation with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteRecommendation($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}