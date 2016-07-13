<?php
/**
 * 
 * @author SopheakChhin
 * @date Jul 13, 2016
 * @time 6:00:00 PM
 */
namespace Blog\Factory;

use Blog\Controller\ListController;
use Blog\Model\PostRepositoryInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class ListControllerFactory implements FactoryInterface {
    
    public function __invoke(ContainerInterface $container, $requestedName, array $options=null) {
        return new ListController($container->get(PostRepositoryInterface::class));
    }
    
}