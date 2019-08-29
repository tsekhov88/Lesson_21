<?php

namespace App\Repositories;

abstract class AbstractRepository // родитель для всех репозиториев

{
	protected abstract function getClassName() : string; // с какой моделью работает

	public function store(array $data) // стандартные действия
	{
		$class = $this->getClassName();

		$model = new $class();
		$model->fill($data);
		$model->save();
		$model->fresh();

		return $model;
	}

}