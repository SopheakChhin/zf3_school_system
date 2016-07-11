<?php
/*
 * Date: 2016-07-11
 * Time: 11:17
 * Author: Sopheak Chhin
 */

namespace Album\Controller;

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
        //$adapter = $this->plugins->getServiceLocator()->get(Model\AlbumTable::class);
        $resultSet = $this->table->fetchAll();
        
        return new ViewModel([
            'albums' => $resultSet,
        ]);
    }

    public function addAction()
    {
       // $adapter = $this->plugins->getServiceLocator()->get('Model\AlbumTable');
        //$at = new AlbumTable($adapter);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}