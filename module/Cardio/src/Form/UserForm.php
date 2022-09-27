<?php
namespace Cardio\Form;
use Laminas\Form\Form;

class UserForm extends Form{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('user');

        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        $this->add([
            'name' => 'username',
            'type' => 'text',
            'options' => [
                'label' => 'Username',
            ],
        ]);
        $this->add([
            'name' => 'password',
            'type' => 'text',
            'options' => [
                'label' => 'Password',
            ],
        ]);
        $this->add([
            'name' => 'first_name',
            'type' => 'text',
            'options' => [
                'label' => 'First Name',
            ],
        ]);
        $this->add([
            'name' => 'last_name',
            'type' => 'text',
            'options' => [
                'label' => 'Last Name',
            ],
        ]);
        $this->add([
            'name' => 'is_admin',
            'type' => 'text',
            'options' => [
                'label' => 'Is admin?',
            ],
        ]);
        $this->add([
            'name' => 'id_clinic',
            'type' => 'text',
            'options' => [
                'label' => 'Id clinic',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Sign Up',
                'id'    => 'submitbutton',
                'class' => 'btn btn-primary'
            ],
        ]);
    }
}