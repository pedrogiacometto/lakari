<?php

/**
 * Description of Login
 *
 * @author Pedro
 */

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;


class Login extends Form
{

    public function __construct($name = NULL)
    {
       
        
        parent::__construct($name);
        
        $this->setAttribute('action', 'admin/login/');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'loginEmail',
            'attributes' => array(
                'type' => 'text',
                'id' => 'inputEmail',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => false,
                'autofocus' => true,
                
            ),
        ));
        
        $this->add(array(
            'name' => 'loginPassword',
            'attributes' => array(
                'type' => 'password',
                'id' => 'inputPassword',
                'class' => 'form-control has-error',
                'placeholder' => 'Password',
                'required' => false,
                
            )
        ));
        
        $this->add(array(
            'name' => 'loginRecordad',
            'attributes' => array(
                'type' => 'checkbox',
                'id' => 'inputRecordar',
                
               
                
            )
        ));
        
        $this->add(array(
            'name' => 'loginSubmit',
            'attributes' => array(
                'type' => 'submit',                
                'value' => 'Entrar',
                'class' => "btn btn-lg btn-primary btn-block"
            ),
        ));
    }

}
