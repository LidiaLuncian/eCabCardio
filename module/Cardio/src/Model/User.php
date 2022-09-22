<?php
namespace Cardio\Model;

use DomainException;
use Laminas\Db\Sql\Ddl\Column\BigInteger;
use Laminas\Filter\Boolean;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;

class User implements InputFilterAwareInterface
{

    public $id;
    public $username;
    public $password;
    public $firstName;
    public $lastName;
    public $isAdmin;
    public $idClinic;

    private $inputFilter;

    public function exchangeArray(array $data){
        $this->id     = !empty($data['id']) ? $data['id'] : null;
        $this->username     = !empty($data['username']) ? $data['username'] : null;
        $this->password     = !empty($data['password']) ? $data['password'] : null;
        $this->firstName     = !empty($data['first_name']) ? $data['first_name'] : null;
        $this->lastName     = !empty($data['last_name']) ? $data['last_name'] : null;
        $this->isAdmin     = !empty($data['is_admin']) ? $data['is_admin'] : null;
        $this->idClinic     = !empty($data['id_clinic']) ? $data['id_clinic'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter){
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'username' => $this->username,
            'password'  => $this->password,
            'firstName'  => $this->firstName,
            'lastName'  => $this->lastName,
            'isAdmin'  => $this->isAdmin,
            'idClinic'  => $this->idClinic,
        ];
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
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'username',
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
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'password',
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
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'first_name',
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
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'last_name',
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
                        'max' => 50,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'is_admin',
            'required' => true,
            'filters' => [
                ['name' => Boolean::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'id_clinic',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);
        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}