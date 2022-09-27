<?php
namespace Cardio\Controller;

use Cardio\Form\UserForm;
use Cardio\Model\User;
use Cardio\Model\UserTable;
use Laminas\Mvc\Controller\AbstractActionController;

class AuthController extends AbstractActionController{

    private $table;
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }

    public function createAction(){
        $form = new UserForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $user = new User();
        $form->setInputFilter($user->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $user->exchangeArray($form->getData());
        $this->table->saveUser($user);
        return $this->redirect()->toRoute('user');
    }
}