<?php
	use Symfony\Component\Routing;

	define('KERNEL_DIR', __DIR__);
	define('PROJECT_DIR', KERNEL_DIR . '/Story');
	define('VIEWS_DIR', KERNEL_DIR . '/Story/views');

	$routes = new Routing\RouteCollection();

	$routes->add('index', new Routing\Route('/', array(
		'_controller' => 'Story\Controller\DefaultController::indexAction',
	)));

	$routes->add('list', new Routing\Route('/list', array(
		'year' => null,
		'_controller' => 'Story\Controller\DefaultController::listAction',
	)));

	$routes->add('add', new Routing\Route('/add', array(
		'_controller' => 'Story\Controller\DefaultController::addAction',
		array(),
		array(),
		'',
		array(),
		array('POST')
	)));

	$routes->add('delete', new Routing\Route('/delete/{id}', array(
		'_controller' => 'Story\Controller\DefaultController::deleteAction',
		array(),
		array(),
		'',
		array(),
		array('DELETE')
	)));

	return $routes;
