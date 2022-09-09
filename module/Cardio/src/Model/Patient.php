<?php
namespace Cardio\Model;

class Patient{

    public $id;
    public $firstName;
    public $lastName;
    public $dateOfBirth;
    public $patientNumber;
    public $county;
    public $city;
    public $address;
    public $ocupation;
    public $job;
    public $phone;
    public $email;
    public $cnp;
    public $maritalStatus;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->firstName = !empty($data['firstName']) ? $data['firstName'] : null;
        $this->lastName  = !empty($data['lastName']) ? $data['lastName'] : null;
        $this->dateOfBirth  = !empty($data['dateOfBirth']) ? $data['dateOfBirth'] : null;
        $this->patientNumber  = !empty($data['patientNumber']) ? $data['patientNumber'] : null;
        $this->county  = !empty($data['county']) ? $data['county'] : null;
        $this->city  = !empty($data['city']) ? $data['city'] : null;
        $this->address  = !empty($data['address']) ? $data['address'] : null;
        $this->ocupation  = !empty($data['ocupation']) ? $data['ocupation'] : null;
        $this->job  = !empty($data['job']) ? $data['job'] : null;
        $this->phone  = !empty($data['phone']) ? $data['phone'] : null;
        $this->email  = !empty($data['email']) ? $data['email'] : null;
        $this->cnp  = !empty($data['cnp']) ? $data['cnp'] : null;
        $this->maritalStatus  = !empty($data['maritalStatus']) ? $data['maritalStatus'] : null;
    }
}