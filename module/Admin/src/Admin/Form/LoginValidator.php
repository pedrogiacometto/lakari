<?php

/**
 * Description of LoginValidator
 *
 * @author Pedro
 */

namespace Admin\Form;

use Zend\Validator\StringLength;
use Zend\Validator\NotEmpty;
use Zend\Validator\Identical;
use Zend\Validator\EmailAddress;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\I18n\Validator\Alnum;
use Zend\Validator\AbstractValidator;
use Zend\Mvc\I18n\Translator;

class LoginValidator extends InputFilter
{

    public function __construct()
    {
        $loginEmail = new Input('loginEmail');
        $loginEmail->setRequired(true);
        $loginEmail->getFilterChain()
                ->attachByName('StripTags')
                ->attachByName('StringTrim');

        $loginEmail->getValidatorChain()
                /* ->addValidator(new NotEmpty(
                  array('messages' => array(NotEmpty::IS_EMPTY => 'El campo no puede quedar vacío.'))
                  )) */
                ->addValidator(new EmailAddress(array(
                    'domain' => false
                        )
        ));

        $this->add($loginEmail);

        $this->add(array(
            'name' => 'loginPassword',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Alnum'),
            ),
            'validators' => array(
//                array(
//                    'name' => 'NotEmpty', 'options' => array(
//                        'messages' => array(NotEmpty::IS_EMPTY => 'El campo no puede quedar vacío.'),
//                    ),
//                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 4,
                        'max' => 8,
                        'messages' => array(
                                'stringLengthTooShort' => 'Debe contener de 4 a 8 caracteres!', 
                                'stringLengthTooLong' => 'Debe contener de 4 a 8 caracteres!' 
                            ),
                    ),
                ),
            ),
        ));
    }

    //put your code here
}
