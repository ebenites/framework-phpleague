<?php
namespace App\Controllers;

use App\Services\View;

class ProfileController {
    
    protected $view;

	public function __construct(View $view) {
		$this->view = $view;
	}

	public function index ($request, $args) {
		return $this->view->render('profile'/*'profile.twig'*/, $args);
	}
}