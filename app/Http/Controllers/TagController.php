<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TagRequest;

use App\Tag;

use Validator;

use Alert;

class TagController extends Controller
{
    public function index() {
    	$tags = Tag::all();
        
    	return view('admin.tags.index', ['tags' => $tags]);
    }

    public function create() {
    	return abort(404);
    }

    public function store(TagRequest $request) {
		
		$tag = new Tag();
		
		$tag->name = $request->name;
		$tag->slug = $request->slug;
		$tag->description = $request->description;

		$tag->save();

		Alert::success('Successfully create tag!', 'Created');
		return redirect('tags');
    }

    public function edit($id) {
    	$tag = Tag::find($id);
    	$tags = Tag::all();

    	return view('admin.tags.edit', ['tag' => $tag, 'tags' => $tags]);
    }

    public function update($id, TagRequest $request) {

    	$tag = Tag::find($id);

    	$tag->fill($request->all())->save();

    	Alert::success('Successfully update the tag!', 'Updated');
    	return redirect('tags');
    }

    public function destroy($id) {
    	$tag = Tag::find($id);
    	$tag->delete();

    	Alert::success('Successfully delete the tag', 'Deleted');
    	return redirect('tags');
    }
}
