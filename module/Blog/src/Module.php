<?php
/**
 * 
 * @author SopheakChhin
 * @date Jul 13, 2016
 * @time 3:47:07 PM
 */
namespace Blog;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface {
    
    public function getConfig() {
       return include __DIR__.'/../config/module.config.php';
    }
    
}