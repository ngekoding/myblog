<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;

use App\Category;

use Validator;

use Alert;

class CategoryController extends Controller
{
    public function index() {
    	$categories = Category::paginate(10);

    	return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create() {
    	return abort(404);
    }

    public function store(CategoryRequest $request) {
		
		$category = new Category();
		
		$category->name = $request->name;
		$category->description = $request->description;

		$category->save();

		Alert::success('Successfully create category!', 'Created');

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

    	Alert::success('Successfully update the category!', 'Updated');

    	return redirect('categories');
    }

    public function destroy($id) {
    	$category = Category::find($id);
    	$category->delete();

    	Alert::success('Successfully delete the category', 'Deleted');

    	return redirect('categories');
    }
}
