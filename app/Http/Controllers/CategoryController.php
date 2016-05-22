<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use Validator;

class CategoryController extends Controller
{
    public function index() {
    	$categories = Category::all();

    	return view('admin.categories.create', ['categories' => $categories]);
    }

    public function create() {
    	return $this->index();
    }

    public function store(Request $request) {
    	$rules = [
    		'name' => 'required',
    		'slug' => 'required'
    	];

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		return redirect('categories/create')
    			->withErrors($validator)
    			->withInput();
    	}
		
		$category = new Category();
		
		$category->name = $request->name;
		$category->slug = $request->slug;
		$category->description = $request->description;

		$category->save();

		return redirect('categories')->with('success', 'Successfully create category!');
    }

    public function edit($id) {
    	$category = Category::find($id);
    	$categories = Category::all();

    	return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }

    public function update($id, Request $request) {
    	$rules = [
    		'name' => 'required',
    		'slug' => 'required'
    	];

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		return redirect('categories/'.$request->id.'/edit')
    			->withErrors($validator)
    			->withInput();
    	}

    	$category = Category::find($id);

    	$category->fill($request->all())->save();

    	return redirect('categories')->with('list-success', 'Successfully update the category!');
    }

    public function destroy($id) {
    	$category = Category::find($id);
    	$category->delete();

    	return redirect('categories')->with('list-success', 'Successfully delete the category!');
    }
}
