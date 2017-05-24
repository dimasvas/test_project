<?php
	namespace Story\Controller;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Story\Model\Story;
	use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
	use Twig_Loader_Filesystem;
	use Twig_Environment;

	class DefaultController
	{
		public function indexAction(Request $request)
		{
			$loader = new Twig_Loader_Filesystem(VIEWS_DIR);
			$twig = new Twig_Environment($loader);

			$response =  new Response(
				$twig->render('index.twig', array('name' => 'Fabien'))
			);

			return $response;
		}

		public function addAction(Request $request)
		{
			if(!$request->isXmlHttpRequest()) {
				//throw new AccessDeniedHttpException('Not allowed!');
			}

			$request->get('story');
		}


		public function listAction(Request $request)
		{
		}
	}
