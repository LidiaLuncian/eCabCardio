<?php
namespace Cardio\Model;

class Image{

    public $id;
    public $image;
    public $idConsult;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->image = !empty($data['image']) ? $data['image'] : null;
        $this->idConsult  = !empty($data['idConsult']) ? $data['idConsult'] : null;
    }
}