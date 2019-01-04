<?php
namespace App\Controllers;

use App\Services\View;
use App\Models\User;

class HomeController {

    protected $view;

	public function __construct(View $view) {
		$this->view = $view;
	}
	
	public function index ($request) {
	   // \Kint::dump($request);
	   // \Kint::dump($request->getQueryParams()['id']);
		$user = 'ebenites';
		return $this->view->render('home'/*'home.twig'*/, compact('user'));
	}
    
	public function findUser ($request, array $args) {
		$user = User::find($args['id']);
		return $this->view->render('user', compact('user'));
	}

	public function randomUser ($request) {
		$user = User::random();
		return $this->view->render('user', compact('user'));
	}

	public function users ($request) {
		$users = User::all();
		return $this->view->render('users', compact('users'));
	}

	public function userPosts ($request, array $args) {
		$user = User::find($args['id']);
		$posts = $user->posts;
		return $this->view->render('posts', compact('posts'));
	}
}