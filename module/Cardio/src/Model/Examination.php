<?php
namespace Cardio\Model;

class Examination{
    public $id;
    public $name;
    public $price;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->price  = !empty($data['price']) ? $data['price'] : null;
    }
}
