<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class ImageTable{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getImage($id)
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

    public function saveImage(Image $image)
    {
        $data = [
            'image' => $image->image,
            'idConsult'  => $image->idConsult,
        ];

        $id = (int) $image->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getImage($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update image with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteImage($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}