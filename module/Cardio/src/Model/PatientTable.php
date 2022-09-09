<?php
namespace Cardio\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class PatientTable{
    private $tableGateway;
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getPatient($id)
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

    public function savePatient(Patient $patient)
    {
        $data = [
            'firstName' => $patient->firstName,
            'lastName'  => $patient->lastName,
            'dateOfBirth'  => $patient->dateOfBirth,
            'patientNumber'  => $patient->patientNumber,
            'county'  => $patient->county,
            'city'  => $patient->city,
            'address'  => $patient->address,
            'ocupation'  => $patient->ocupation,
            'job'  => $patient->job,
            'phone'  => $patient->phone,
            'email'  => $patient->email,
            'cnp'  => $patient->cnp,
            'maritalStatus'  => $patient->maritalStatus,
        ];

        $id = (int) $patient->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getPatient($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update patient with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePatient($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}