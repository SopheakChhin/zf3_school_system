<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Navigation\Navigation;

class Module
{
    const VERSION = '3.0.0dev';

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
