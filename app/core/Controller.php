<?php
namespace core;

abstract class Controller {
	protected $model;
	protected $view;
	abstract public function index();
}

?>