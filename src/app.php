<?php
	use Symfony\Component\Routing;

	define('KERNEL_DIR', __DIR__);
	define('PROJECT_DIR', KERNEL_DIR . '/Story');
	define('VIEWS_DIR', KERNEL_DIR . '/Story/views');

	$routes = new Routing\RouteCollection();

	$routes->add('add', new Routing\Route('/add', array(
		'year' => null,
		'_controller' => 'Story\Controller\DefaultController::addAction',
	)));

	$routes->add('list', new Routing\Route('/list', array(
		'year' => null,
		'_controller' => 'Story\Controller\DefaultController::listAction',
	)));

	return $routes;
