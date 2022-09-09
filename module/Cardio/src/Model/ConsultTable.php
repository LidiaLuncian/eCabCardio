<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class ConsultTable{

    private $tableGateway;
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getConsult($id)
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

    public function saveConsult(Consult $consult)
    {
        $data = [
            'date' => $consult->date,
            'idPatient'  => $consult->idPatient,
            'personalPhysiologicalAntecedents'  => $consult->personalPhysiologicalAntecedents,
            'personalPathologicalAntecedents'  => $consult->personalPathologicalAntecedents,
            'heredoCollateralAntecedents'  => $consult->heredoCollateralAntecedents,
            'environmentConditions'  => $consult->environmentConditions,
            'presentState'  => $consult->presentState,
            'circulatorySystem'  => $consult->circulatorySystem,
            'localComplementaryExaminations'  => $consult->localComplementaryExaminations,
            'personalAntecedents'  => $consult->personalAntecedents,
            'consultReasons'  => $consult->consultReasons,
            'observations'  => $consult->observations,
            'diagnostic'  => $consult->diagnostic,
            'recommendations'  => $consult->recommendations,
            'treatment'  => $consult->treatment,
        ];

        $id = (int) $consult->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getConsult($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update consult with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteConsult($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}