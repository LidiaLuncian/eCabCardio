<?php
namespace Cardio\Model;

class MedicalLetter{

    public $id;
    public $idUser;
    public $idConsult;
    public $observations;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->idUser = !empty($data['idUser']) ? $data['idUser'] : null;
        $this->idConsult  = !empty($data['idConsult']) ? $data['idConsult'] : null;
        $this->observations  = !empty($data['observations']) ? $data['observations'] : null;
    }
}