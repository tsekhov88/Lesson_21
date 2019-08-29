<?php

namespace App\Repositories;

use App\Author;

class AuthorsRepository extends AbstractRepository
{
	protected function getClassName() : string
	{
		return Author::class;
	}
}