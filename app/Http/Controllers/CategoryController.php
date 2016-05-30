<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Http\Requests\CategoryRequest;

use Validator;

use Alert;

class CategoryController extends Controller
{
    public function index() {
    	$categories = Category::all();

    	return view('admin.categories.create', ['categories' => $categories]);
    }

    public function create() {
    	return $this->index();
    }

    public function store(CategoryRequest $request) {
		
		$category = new Category();
		
		$category->name = $request->name;
		$category->slug = $request->slug;
		$category->description = $request->description;

		$category->save();

		Alert::success('Successfully create category!', 'Success');

		return redirect('categories');
    }

    public function edit($id) {
    	$category = Category::find($id);
    	$categories = Category::all();

    	return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }

    public function update($id, CategoryRequest $request) {

    	$category = Category::find($id);

    	$category->fill($request->all())->save();

    	Alert::success('Successfully update the category!', 'Updated!');

    	return redirect('categories');
    }

    public function destroy($id) {
    	$category = Category::find($id);
    	$category->delete();

    	Alert::success('Successfully delete the category', 'Deleted!');

    	return redirect('categories');
    }
}
