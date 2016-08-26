<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\AlbumTable;
use Interop\Container\ContainerInterface;

class PlaylistController extends AbstractActionController
{
	private $table;
	
	public function __construct(ContainerInterface $container){
		$this->table = $container->get('Album\Model\AlbumTable');
	}
	public function indexAction()
	{
		//$sm = $this->getPluginManager();
		//var_dump($sm);
		//$table = $sm->getServiceLocator()->get('Album\Model\AlbumTable');
		//var_dump($table);
		$paginator = $this->table->fetchAll();
		var_dump($paginator->toArray());
		return new ViewModel();
	}
}