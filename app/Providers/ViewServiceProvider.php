<?php
namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Services\View;

class ViewServiceProvider extends AbstractServiceProvider {

	/**
	 * @var array
	 */
	protected $provides = [
		View::class
	];

	/**
	 * @throws \Psr\Container\ContainerExceptionInterface
	 * @throws \Psr\Container\NotFoundExceptionInterface
	 */
	public function register() {
		$this->getContainer()->add(View::class)->addArgument(
			$this->getContainer()->get('response')
		);
	}
}