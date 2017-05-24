<?php

namespace Story\Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

class BaseController {

	/**
	 * @var Twig_Environment
	 */
	protected $twig;

	protected $entityManager;

	public function __construct()
	{
		global $entityManager;
		$this->entityManager = $entityManager;

		$loader = new Twig_Loader_Filesystem(VIEWS_DIR);
		$this->twig = new Twig_Environment($loader);
	}
}
