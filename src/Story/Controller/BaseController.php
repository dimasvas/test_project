<?php

namespace Story\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Symfony\Component\Validator\Validation;

/**
 * Class BaseController
 * @package Story\Controller
 */
class BaseController {

	/**
	 * @var Twig_Environment
	 */
	protected $twig;

	/**
	 * @var \Doctrine\ORM\EntityManager
	 */
	protected $entityManager;

	/**
	 * @var \Symfony\Component\Validator\Validator\ValidatorInterface
	 */
	protected $validator;

	/**
	 * BaseController constructor.
	 */
	public function __construct()
	{
		global $entityManager;
		$this->entityManager = $entityManager;

		$loader = new Twig_Loader_Filesystem(VIEWS_DIR);
		$this->twig = new Twig_Environment($loader);

		$this->validator = Validation::createValidatorBuilder()
		                             ->addYamlMapping(PROJECT_DIR . '/config/validation.yml')
		                             ->getValidator();
	}
}
