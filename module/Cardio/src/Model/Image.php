<?php
namespace Cardio\Model;

use Laminas\Db\Sql\Ddl\Column\BigInteger;
use Laminas\Db\Sql\Ddl\Column\Blob;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Mvc\Exception\DomainException;

class Image implements InputFilterAwareInterface {

    public $id;
    public $image;
    public $idConsult;

    private $inputFilter;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->image = !empty($data['image']) ? $data['image'] : null;
        $this->idConsult  = !empty($data['idConsult']) ? $data['idConsult'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter){
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }
    public function getInputFilter(){
        if($this->inputFilter){
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => BigInteger::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'image',
            'required' => true,
            'filters' => [
                ['name' => Blob::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'idConsult',
            'required' => true,
            'filters' => [
                ['name' => BigInteger::class],
            ],
        ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}