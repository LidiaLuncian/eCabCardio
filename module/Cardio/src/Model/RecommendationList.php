<?php
namespace Cardio\Model;

class RecommendationList{

    public $id;
    public $name;
    public $idConsult;
    public $idRecommendation;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->idConsult = !empty($data['idConsult']) ? $data['idConsult'] : null;
        $this->idRecommendation = !empty($data['idRecommendation']) ? $data['idRecommendation'] : null;
    }
}