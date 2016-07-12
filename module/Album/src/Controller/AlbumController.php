<?php
/*
 * Date: 2016-07-11
 * Time: 11:17
 * Author: Sopheak Chhin
 */

namespace Album\Controller;

use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    // Add this property:
    private $table;

    // Add this constructor:
    public function __construct(AlbumTable $table)
    {
        $this->table = $table;
    }
    
    public function indexAction()
    {
        //$adapter = $this->plugins->getServiceLocator()->get('AlbumTableGateway');
        //var_dump($adapter);
        /* $resultSet = $this->table->fetchAll();*/
        return new ViewModel([
            'albums' => $this->table->fetchAll(),
        ]); 
    }

    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');
        
        
        $request = $this->getRequest();
        if (! $request->isPost()) {
            return ['form' => $form];
        }
        
        $album = new Album();
        $form->setInputFilter($album->getInputFilter());
        $form->setData($request->getPost());
        if (! $form->isValid()) {
            return ['form' => $form];
        }
        
        $album->exchangeArray($form->getData());
        $this->table->saveAlbum($album);
        
        return $this->redirect()->toRoute('album');
        
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}