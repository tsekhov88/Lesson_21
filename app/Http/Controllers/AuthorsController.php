<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\StoreAuthorRequest;


class AuthorsController extends Controller
{
    public function store(StoreAuthorRequest $request)
    {
    	$data = $request->all();

    	$model = new Author();
    	$model->fill($data);
    	$model->save();

    	return response()->json([
    		'success' =>true
    	]);
    }

    public function update(StoreAuthorRequest $request, Author $author)
    {
    	$data = $request->all();

    	$author->fill($data);
    	$author->save();

    	return response()->json([
    		'success' =>true
    	]);
    }

    public function delete(Author $author)
    {
    	$author->delete();

    	return response()->json([
    		'success' =>true
    	]);
    }

    public function index()
    {
    	$authors = Author::all();

    	return $authors;
    }
    
}
