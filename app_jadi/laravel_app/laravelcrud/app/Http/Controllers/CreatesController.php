<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Article;

class CreatesController extends Controller
{
    public function home(){
    	$articles = Article::all();
    	return view('home',['articles'=>$articles]);
/*    	echo "<pre>";
    	print_r($articles);
    	echo "</pre>";*/
    }

    public function add(Request $request){
    	$this->validate($request,[
    		'title' => 'required',
    		'description' => 'required'
    	]);

    	$articles = new Article;
    	$articles->title = $request->input('title');
    	$articles->description = $request->input('description');
    	$articles->save();
    	return redirect('/')->with('info','Article Saved Successfully!');
    } 

    public function update($id){
    	$articles = Article::find($id);
    	return view('update',['articles'=>$articles]);
    	/* check 
    	echo '<pre>';
    	print_r($articles);
    	echo "</pre>";
    	exit();*/    	
    } 

    public function edit(Request $request, $id){
    	$this->validate($request,[
    		'title' => 'required',
    		'description' => 'required'
    	]);
    	$data = array(
			'title' => $request->input('title'),
    		'description' => $request->input('description')
    	);
    	Article::where('id',$id)
    	->update($data);
    	return redirect('/')->with('info','Article Updated Successfully!');
    } 

    public function read($id){
    	$articles = Article::find($id);
    	//return $id;
    	return view('read',['articles'=>$articles]);
    }

    public function delete($id){
		Article::where('id',$id)
		->delete();
		return redirect('/')->with('info','Article Deleted Successfully!');
    } 
}
