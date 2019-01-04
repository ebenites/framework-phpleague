<?php
namespace App\Services;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;

class View {
	/**
	 * @var \Twig_Environment
	 */
	protected $view;

	/**
	 * @var Response
	 */
	protected $response;

	/**
	 * View constructor.
	 *
	 * @param Response $response
	 */
	public function __construct(Response $response) {
		$this->response = $response;
	    // Twig
// 		$loader = new \Twig_Loader_Filesystem(BASE_PATH . 'app/Views');
// 		$this->view = new \Twig_Environment($loader);
        // Blade
		$this->view = new \Jenssegers\Blade\Blade(BASE_PATH . 'app/Views', BASE_PATH . 'app/Cache/Views');
	}

	/**
	 * @param string $view
	 * @param array $data
	 *
	 * @return ResponseInterface
	 * @throws \Twig_Error_Loader
	 * @throws \Twig_Error_Runtime
	 * @throws \Twig_Error_Syntax
	 */
	public function render (string $view, array $data = []): ResponseInterface {
		$this->response->getBody()->write($this->view->render($view, $data));
		return $this->response;
	}
}