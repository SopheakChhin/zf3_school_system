<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Navigation\Navigation;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleEvent;
use Album\Model\AlbumTable;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Interop\Container\ContainerInterface;
use lib\MyClass;

class Module
{
    const VERSION = '3.0.0dev';

    public function init(ModuleManager $ModuleManager)
    {
    	$event = $ModuleManager->getEventManager();

    	$event->attach(ModuleEvent::EVENT_MERGE_CONFIG, [$this, 'onMergeConfig']);
    }
    
    public function onMergeConfig(ModuleEvent $e)
    {
    	$eventListener = $e->getConfigListener();
    	$config = $eventListener->getMergedConfig(false);

        //$eventListener->setMergedConfig();
    	//var_dump($config['navigation']);exit;
    	
    	//print_r($config);exit;
    	//$serviceManager = new ServiceManager();
    	//$mvcEvent = MvcEvent::class;
    	//$table = new AlbumTable($serviceManager->get(\Album\Model\AlbumTable::class));
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    public function getControllerConfig()
    {
    	return [
    		'factories' => [
    				Controller\IndexController::class => function($container){
    					return new Controller\IndexController(
    								$container->get(\Album\Model\AlbumTable::class)
    								//$container->getServiceConfig(Model\AlbumTable::class)
    							);
    				}
    		]
    	];
    }
    
    /* public function getNavigationConfig()
    {
    	return [
    		'factories' => [
    				'navigation' => [
    						'default' => [
    								[
    										'label' => 'Home',
    										'route' => 'home',
    								],
    								[
    										'label' => 'Album',
    										'route' => 'album',
    										'pages' => [
    												[
    														'label'  => 'Add',
    														'route'  => 'album',
    														'action' => 'add',
    												],
    												[
    														'label'  => 'Edit',
    														'route'  => 'album',
    														'action' => 'edit',
    												],
    												[
    														'label'  => 'Delete',
    														'route'  => 'album',
    														'action' => 'delete',
    												],
    										],
    								],
    						],
    				],
    				
    		]
    	];
    	//$container = new Navigation($pages);
    	//$view->plugin('navigation')->setContainer($container);
    	//return $container;
    } */
}
