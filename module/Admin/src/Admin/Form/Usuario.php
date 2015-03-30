<?php

/**
 * Description of Login
 *
 * @author Pedro
 */

namespace Admin\Form;

use Zend\Form\Form;
use Zend\Form\Element;


class Usuario extends Form
{

    public function __construct($name = NULL)
    {
       
        
        parent::__construct($name);
        
        $this->setAttribute('action', 'admin/usuario/crear');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'usuarioApellido',
            'attributes' => array(
                'type' => 'text',
                'id' => 'inputApellido',
                'class' => 'form-control',
                'placeholder' => 'Apellido',
                'required' => false,
                'autofocus' => true,
                
            ),
        ));
        $this->add(array(
            'name' => 'usuarioNombre',
            'attributes' => array(
                'type' => 'text',
                'id' => 'inputNombre',
                'class' => 'form-control',
                'placeholder' => 'Nombre',
                'required' => false,
                
                
            ),
        ));
        
        $this->add(array(
            'name' => 'usuarioEmail',
            'attributes' => array(
                'type' => 'email',
                'id' => 'usuarioEmail',
                'class' => 'form-control',
                'placeholder' => 'Email',
                'required' => true,
                'autofocus' => true,
                
            ),
        ));
        
        $this->add(array(
            'name' => 'usuarioPassword',
            'attributes' => array(
                'type' => 'password',
                'id' => 'inputPassword',
                'class' => 'form-control has-error',
                'placeholder' => 'Password',
                'required' => true,
                
            )
        ));
        $this->add(array(
            'name' => 'usuarioPassword2',
            'attributes' => array(
                'type' => 'password',
                'id' => 'inputPassword2',
                'class' => 'form-control has-error',
                'placeholder' => 'Repeat Password',
                'required' => true,
                
            )
        ));
    
        $this->add(array(
            'name' => 'usuarioSubmit',
            'attributes' => array(
                'type' => 'submit',                
                'value' => 'Crear',
                'class' => "btn btn-primary"
            ),
        ));
    }

}
