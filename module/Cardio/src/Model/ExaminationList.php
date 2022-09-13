<?php
namespace Cardio\Model;

use Laminas\Db\Sql\Ddl\Column\BigInteger;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToFloat;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Mvc\Exception\DomainException;
use Laminas\Validator\StringLength;

class ExaminationList implements InputFilterAwareInterface {

    public $id;
    public $name;
    public $price;
    public $idConsult;
    public $idExamination;

    private $inputFilter;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->price  = !empty($data['price']) ? $data['price'] : null;
        $this->idConsult  = !empty($data['idConsult']) ? $data['idConsult'] : null;
        $this->idExamination  = !empty($data['idExamination']) ? $data['idExamination'] : null;
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
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'price',
            'required' => true,
            'filters' => [
                ['name' => ToFloat::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'idConsult',
            'required' => true,
            'filters' => [
                ['name' => BigInteger::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'idExamination',
            'required' => true,
            'filters' => [
                ['name' => BigInteger::class],
            ],
        ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}