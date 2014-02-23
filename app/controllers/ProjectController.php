<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Project::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return new Project();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{ 	
		$obj = new Project();
		$obj->title = Input::get('title');
		$obj->slug = createSlug($obj->title);
		$obj->description = Input::get('description');
		$obj->has_dimension = Input::get('has_dimension');
		$obj->has_budget = Input::get('has_budget');
		$obj->dimension = Input::get('dimension');
		$obj->budget = Input::get('budget');
		$obj->save();
		return $obj;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id_or_slug)
	{	
		$obj = Project::find($id_or_slug);
		if(is_object($obj))
			return $obj;
		else 
			return Project::where('slug', $id_or_slug)->first();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Project::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$inputs = Input::all();
		$inputs['slug'] = createSlug($inputs['title']);

		$obj = Project::find($id);
		$obj->update($inputs);
		return $obj;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$obj = Project::find($id);
		return $obj->destroy($id);
	}

	public function photo(){  

		$obj = new ProjectPhoto();
		

		return $obj;
	}

	public function deletePhoto(){
		ProjectPhoto::delete(Input::get('id'));
	}

}