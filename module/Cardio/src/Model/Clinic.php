<?php
namespace Cardio\Model;

class Clinic{

    public $id;
    public $name;
    public $logo;
    public $address;
    public $phone;
    public $zip;
    public $bankAccount;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->logo  = !empty($data['logo']) ? $data['logo'] : null;
        $this->address  = !empty($data['address']) ? $data['address'] : null;
        $this->phone  = !empty($data['phone']) ? $data['phone'] : null;
        $this->zip  = !empty($data['zip']) ? $data['zip'] : null;
        $this->bankAccount  = !empty($data['bankAccount']) ? $data['bankAccount'] : null;
    }
}