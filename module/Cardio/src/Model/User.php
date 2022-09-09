<?php
namespace Cardio\Model;

class User{

    public $id;
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $isAdmin;
    public $idClinic;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->username     = !empty($data['username']) ? $data['username'] : null;
        $this->password     = !empty($data['password']) ? $data['password'] : null;
        $this->firstName     = !empty($data['firstName']) ? $data['firstName'] : null;
        $this->lastName     = !empty($data['lastName']) ? $data['lastName'] : null;
        $this->isAdmin     = !empty($data['isAdmin']) ? $data['isAdmin'] : null;
        $this->idClinic     = !empty($data['idClinic']) ? $data['idClinic'] : null;
    }

}