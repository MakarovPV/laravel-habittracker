<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository.
 */
abstract class CoreRepository 
{
    use Dates;
    /**
     * Объект модели.
     */
	protected $model;

 	/**
     * Create a new controller instance.
     *
     * @return object
     */
	public function __construct()
	{
		$this->model = app($this->model());
	}

    public function getAll()
    {
       
    }
	
    /**
     * Возвращение класса модели.
     *
     * @return string
     */
    abstract protected function model();
}
