<?php
/**
 * 
 * @author SopheakChhin
 * @date Jul 11, 2016
 * @time 11:20:08 AM
 */
namespace Album;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        //apply system setting
        $serviceManager = $e->getApplication()->getServiceManager();
        $config = $serviceManager->get('config');
        $phpSettings = $config['php_settings'];
        if ($phpSettings) {
            foreach ($phpSettings as $key => $value) {
                ini_set($key, $value);
            }
        }
    }
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                /* Model\AlbumTable::class => function($container) {
                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
                    return new Model\AlbumTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function ($container) {
                    //var_dump(AdapterInterface::class);
                    //$dbAdapter = $container->get(AdapterInterface::class);
                    $dbAdapter = $container->get('Application\Db\WriteAdapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                }, */
                Model\AlbumTable::class => function($container){
                    $tableGateway = $container->get(Model\AlbumTableGateway::class);
                    return new Model\AlbumTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function ($container){
                    //$dbAdapter = $container->get('Application\Db\WriteAdapter');
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
           ],
       ];
    }
    
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\AlbumController::class => function($container) {
                    return new Controller\AlbumController(
                        $container->get(Model\AlbumTable::class)
                    );
                },
            ],
        ];
    }
}