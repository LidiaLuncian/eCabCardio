<?php
namespace Cardio\Model;

class ExaminationList{

    public $id;
    public $name;
    public $price;
    public $idConsult;
    public $idExamination;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->price  = !empty($data['price']) ? $data['price'] : null;
        $this->idConsult  = !empty($data['idConsult']) ? $data['idConsult'] : null;
        $this->idExamination  = !empty($data['idExamination']) ? $data['idExamination'] : null;
    }
}