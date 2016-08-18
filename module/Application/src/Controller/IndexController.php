<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;
use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
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
    	$paginator = $this->table->fetchAll(true);
    	$page = (int) $this->params()->fromQuery('page',1);
    	$page = ($page<1? 1 : $page);
    	$paginator->setCurrentPageNumber($page);
    	
    	// Set the number of items per page to 10:
    	$paginator->setItemCountPerPage(10);
    	
    	foreach ($paginator as $p){
    		echo $p->title;
    	}
        return new ViewModel();
    }
}
