<?php
	namespace Story\Controller;

	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Story\Model\Story;
	use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

	/**
	 * Class DefaultController
	 * @package Story\Controller
	 */
	class DefaultController extends BaseController
	{
		/**
		 * @param Request $request
		 *
		 * @return Response
		 */
		public function indexAction(Request $request)
		{
			$response =  new Response(
				$this->twig->render('index.twig', array('name' => 'Fabien'))
			);

			return $response;
		}

		/**
		 * @param Request $request
		 *
		 * @return Response
		 */
		public function listAction(Request $request)
		{
			$storyRepository = $this->entityManager->getRepository('Story\Model\Story');
			$entities = $storyRepository->findAll();

			$response =  new Response(
				$this->twig->render('list.twig', array('stories' => $entities))
			);

			return $response;
		}

		/**
		 * @param Request $request
		 *
		 * @return JsonResponse
		 */
		public function addAction(Request $request)
		{
			if(!$request->isXmlHttpRequest()) {
				//throw new AccessDeniedHttpException('Not allowed!');
			}

			$entity = new Story();
			$entity->setText($request->get('story', null));

			$errors = $this->validator->validate($entity);

			if (count($errors) > 0) {
				$errorsString = (string) $errors;

				return new Response(array('msg' => $errorsString, 'error' => true));
			}

			$this->entityManager->persist($entity);
			$this->entityManager->flush();

			return new JsonResponse(['msg' => 'success']);

		}

		/**
		 * @param Request $request
		 * @param $id
		 *
		 * @return JsonResponse
		 */
		public function deleteAction(Request $request, $id)
		{
			if(!$request->isXmlHttpRequest()) {
				throw new AccessDeniedHttpException('Not allowed!');
			}

			$story = $this->entityManager
							->getRepository('Story\Model\Story')
							->find($id);

			if (!$story) {
				throw new NotFoundHttpException('Entity not found!');
			}

			$this->entityManager->remove($story);
			$this->entityManager->flush();

			return new JsonResponse(['msg' => 'success']);
		}
	}
