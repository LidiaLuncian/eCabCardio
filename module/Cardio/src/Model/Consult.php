<?php
namespace Cardio\Model;

use Laminas\Db\Sql\Ddl\Column\BigInteger;
use Laminas\Db\Sql\Ddl\Column\Datetime;
use Laminas\Db\Sql\Ddl\Column\Text;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Mvc\Exception\DomainException;
use Laminas\Validator\StringLength;

class Consult implements InputFilterAwareInterface{

    public $id;
    public $date;
    public $idPatient;
    public $personalPhysiologicalAntecedents;
    public $personalPathologicalAntecedents;
    public $heredoCollateralAntecedents;
    public $environmentConditions;
    public $presentState;
    public $circulatorySystem;
    public $localComplementaryExaminations;
    public $personalAntecedents;
    public $consultReasons;
    public $observations;
    public $diagnostic;
    public $recommendations;
    public $treatment;

    private $inputFilter;

    public function exchangeArray(array $data)
    {
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->date = !empty($data['date']) ? $data['date'] : null;
        $this->idPatient  = !empty($data['idPatient']) ? $data['idPatient'] : null;
        $this->personalPhysiologicalAntecedents  = !empty($data['personalPhysiologicalAntecedents']) ? $data['personalPhysiologicalAntecedents'] : null;
        $this->personalPathologicalAntecedents  = !empty($data['personalPathologicalAntecedents']) ? $data['personalPathologicalAntecedents'] : null;
        $this->heredoCollateralAntecedents  = !empty($data['heredoCollateralAntecedents']) ? $data['heredoCollateralAntecedents'] : null;
        $this->environmentConditions  = !empty($data['environmentConditions']) ? $data['environmentConditions'] : null;
        $this->presentState  = !empty($data['presentState']) ? $data['presentState'] : null;
        $this->circulatorySystem  = !empty($data['circulatorySystem']) ? $data['circulatorySystem'] : null;
        $this->localComplementaryExaminations  = !empty($data['localComplementaryExaminations']) ? $data['localComplementaryExaminations'] : null;
        $this->personalAntecedents  = !empty($data['personalAntecedents']) ? $data['personalAntecedents'] : null;
        $this->consultReasons  = !empty($data['consultReasons']) ? $data['consultReasons'] : null;
        $this->observations  = !empty($data['observations']) ? $data['observations'] : null;
        $this->diagnostic  = !empty($data['diagnostic']) ? $data['diagnostic'] : null;
        $this->recommendations  = !empty($data['recommendations']) ? $data['recommendations'] : null;
        $this->treatment  = !empty($data['treatment']) ? $data['treatment'] : null;
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
            'name' => 'date',
            'required' => true,
            'filters' => [
                ['name' => Datetime::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'idPatient',
            'required' => true,
            'filters' => [
                ['name' => BigInteger::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'personalPhysiologicalAntecedents',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'personalPathologicalAntecedents',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'heredoCollateralAntecedents',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'environmentConditions',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'presentState',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'circulatorySystem',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'localComplementaryExaminations',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'personalAntecedents',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'consultReasons',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'observations',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'diagnostic',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'recommendations',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'treatment',
            'required' => false,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
                ['name' => Text::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 0,
                        'max' => 2000,
                    ],
                ],
            ],
        ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}