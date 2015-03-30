<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Admin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Form\Usuario as UsuarioForm;
use Admin\Form\UsuarioValidator;

class UsuarioController extends AbstractActionController
{

    private $usuarioForm;

    public function indexAction()
    {
        return $this->forward()->dispatch('Admin\Controller\Usuario', array('action' => 'crear'));
    }

    public function crearAction()
    {
        $this->usuarioForm = new UsuarioForm;
        $this->usuarioForm->setInputFilter(new UsuarioValidator());

        if ($this->getRequest()->isPost()) {
            $postParams = $this->request->getPost();
            $this->usuarioForm->setData($postParams);
            $this->usuarioForm->isValid();
        }
        return new ViewModel(array(
            'usuarioForm' => $this->usuarioForm,
        ));
    }

    public function guardarAction()
    {
        
        return array();
    }

}
