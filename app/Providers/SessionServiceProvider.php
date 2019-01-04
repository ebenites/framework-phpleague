<?php
namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Services\Session;

class SessionServiceProvider extends AbstractServiceProvider {

	protected $provides = [
		Session::class
	];

	/**
	 * Use the register method to register items with the container via the
	 * protected $this->container property or the `getContainer` method
	 * from the ContainerAwareTrait.
	 *
	 * @return void
	 */
	public function register() {
		$this->getContainer()->add(Session::class);
	}
}