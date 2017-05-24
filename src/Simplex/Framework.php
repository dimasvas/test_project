<?php
	namespace Simplex;

	use Symfony\Component\HttpKernel;
	use Symfony\Component\Routing;
	use Symfony\Component\EventDispatcher\EventDispatcher;
	use Symfony\Component\HttpFoundation\RequestStack;

	class Framework extends HttpKernel\HttpKernel
	{
		public function __construct($routes)
		{
			$context = new Routing\RequestContext();
			$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
			$resolver = new HttpKernel\Controller\ControllerResolver();

			$dispatcher = new EventDispatcher();
			$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher, new RequestStack()));
			$dispatcher->addSubscriber(new HttpKernel\EventListener\ResponseListener('UTF-8'));

			parent::__construct($dispatcher, $resolver);
		}
	}
