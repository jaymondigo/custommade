<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('params')&&Input::get('params')=='favorites'){
			$objs = FavoriteProject::where('user_id', Auth::user()->id)->get(); 
			return $objs;
		}

		return Project::where('user_id', Auth::user()->id)->get();
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
		$type = Input::get('type');

		$obj = new Project();
		$obj->user_id = Auth::user()->id;
		$obj->title = Input::get('title');
		$obj->slug = FoxHelper::createSlug($obj->title);
		$obj->description = Input::get('description');
		$obj->has_dimension = Input::get('has_dimension');
		$obj->has_budget = Input::get('has_budget');
		$obj->dimension = Input::get('dimension');
		$obj->budget = Input::get('budget');
		$obj->type = $type !='' ? $type : 'published';
		$obj->save(); 
		$photosId = Session::has('pIds') ? Session::get('pIds') : array();
		foreach($photosId as $i => $d){
			$photo = ProjectPhoto::find($d); 
			$photo->project_id = $obj->id;
			$photo->save();
		}
		Session::forget('pIds');
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
		$p = Project::find($id);
		if($p->user_id!=Auth::user()->id)
			return array('status'=>'403','messaeg'=>'Permission denied');

		return $p;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$type = Input::get('type');

		$inputs = Input::all();
		$inputs['slug'] = FoxHelper::createSlug($inputs['title']);
		$inputs['type'] = $type !='' ? $type : 'published'; 
		$obj = Project::find($id);

		if($obj->user_id != Auth::user()->id)
			return array('status'=>'403','messaeg'=>'Permission denied');

		$obj->update($inputs);

		$photosId = Session::has('pIds') ? Session::get('pIds') : array();
		foreach($photosId as $i => $d){
			$photo = ProjectPhoto::update(array('id'=>$d, 'project_id'=>$obj->id));
		}
		Session::forget('pIds');

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
		$obj->photo=Input::file('photo');
		$obj->save();      
		$pIds = Session::has('pIds') ? Session::get('pIds') : array();
		array_push($pIds, $obj->id);
 		Session::put('pIds', $pIds);
 		return Session::get('pIds'); 
	}

	public function deletePhoto(){
		$obj = ProjectPhoto::find(Input::get('id'));
		if($obj->project->user_id!=Auth::user()->id)
			return array('status'=>'403','messaeg'=>'Permission denied');

		return $obj->delete(Input::get('id'));
	}

	public function markFavorite(){
		
		$obj = new FavoriteProject();
		$obj->user_id = Auth::user()->id;
		$obj->project_id = Input::get('project_id');
		$obj->save();
	}

}