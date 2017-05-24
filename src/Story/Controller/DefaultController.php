<?php
	namespace Story\Controller;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Story\Model\LeapYear;
	use Twig_Loader_Filesystem;
	use Twig_Environment;

	class DefaultController
	{
		public function addAction(Request $request)
		{
			$loader = new Twig_Loader_Filesystem(VIEWS_DIR);
			$twig = new Twig_Environment($loader);

			$response =  new Response(
				$twig->render('add.twig', array('name' => 'Fabien'))
			);

			return $response;
		}

		public function listAction(Request $request)
		{
		}
	}
