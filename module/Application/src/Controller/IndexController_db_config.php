<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
/* use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\Factory\InvokableFactory;
use stdClass; */
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        //$dbAdapter = $this->getConfig();
        //var_dump($dbAdapter);
        //$isConnect = $dbAdapter->getDriver()->getConnection()->isConnected();
        //$sm = new ServiceManager();
        //$db = $sm->get('db');
        //echo $db;
        //$serviceManager = new ServiceManager([]);
        //$object = $serviceManager->get('Application\Db\WriteAdapter');
        //print_r($object);
        $driverConfig = [
            'driver'=>'Pdo_mysql',
            'database'=>'zf2_master_db',
            'username'=>'root',
            'password'=>'',
            'host'=>'localhost',
        ];
        
        $adapter = new Adapter($driverConfig);
        $statement = $adapter->query('SELECT * FROM users');
        //$statement = $adapter->createStatement($sql);
        $result = $statement->execute();
        $result->current();
        foreach ($result as $k){
            echo 'User Name: '.$k['usr_first_name'];echo "<br>";
        }
        
        //tableGateway
        $adapter = $this->plugins->getServiceLocator()->get('Application\Db\WriteAdapter');
        $tableGateway = new TableGateway('users', $adapter);
        $resultSet = $tableGateway->select();
        $result = $resultSet->current();
        print_r($result);
        
        
        return new ViewModel();
    }
}
