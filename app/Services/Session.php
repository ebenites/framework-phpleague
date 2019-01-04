<?php
namespace App\Services;

use Aura\Session\SessionFactory;

class Session {
	
	protected $session;
    
	protected $segment = 'app';
    
	public function __construct() {
		$this->session = (new SessionFactory())->newInstance($_COOKIE);
	}
    
	public function get(string $key) {
		return $this->session->getSegment($this->segment)->get($key);
	}

	public function set(string $key, string $value) {
		$this->session->getSegment($this->segment)->set($key, $value);
	}

	public function getFlash(string $key) {
		return $this->session->getSegment($this->segment)->getFlash($key);
	}
    
	public function setFlash (string $key, string $value) {
		$this->session->getSegment($this->segment)->setFlash($key, $value);
	}
}