<?php

namespace App\Http\Controllers;

use App\Link;
use App\Pocket;
use App\User;
use Redirect;
use Datatables;
use Auth;


use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
    	return view('admin.link.index');
    }

    public function create()
    {
    	
    	foreach(Auth::user()->pockets as $ob){
    		$pockets[$ob->id]  = $ob->name;
    	}
    	if(empty($pockets)){
    		return redirect('/adminpanel/pockets/create');
    	}
    	return view('admin.link.add', compact('pockets'));
    }

    public function store(Link $link, Request $request)
    {
    	$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
    	$this->validate($request, [
                'title' 	=> 'required|min:4|max:255',
                'link' 		=> 'required|regex:'.$regex,
                'pocket_id' => 'required|integer'
                ]);
    	$link->create($request->all());
    	return redirect('/adminpanel/links')->withFlashMessage('Link added successfully');
    }

    public function edit($id, Link $links, Pocket $pocketModel, User $userModel)
    {

    	$link   = $links->findOrFail($id);
        $pocket = $pocketModel->findOrFail($link->pocket_id);
        $user   = $userModel->findOrFail($pocket->user_id);
        foreach ($user->pockets as $value) {
            $pockets[$value->id] = $value->name;
        }
    	return view('admin.link.edit', compact('link', 'pockets'));
    }

    public function show($id, Link $link)
    {
        $links = $link->where('pocket_id', $id)->get();
        return view('admin.link.show', compact('links'));

    }
    public function update($id ,Link $links, Request $request)
    {
    	$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
    	$this->validate($request, [
                'title' 	=> 'required|min:4|max:255',
                'link' 		=> 'required|regex:'.$regex,
                'pocket_id' => 'required|integer'
                ]);
    	$link = $links->findOrFail($id);
    	$link->update($request->all());
    	return Redirect::back()->withFlashMessage('Link Updated successfully');
    }

    public function destroy($id, Link $links)
    {
    	$link = $links->findOrFail($id);
    	$link->forceDelete();
    	return Redirect('/adminpanel/links')->withFlashMessage('Link deleted successfully');
    }

    public function trash($id, Link $links)
    {
        $link = $links->findOrFail($id);
        $link->delete();
        return Redirect('/adminpanel/links')->withFlashMessage('link moved to the trash');
    }

    public function destroyTrash($id, Link $links)
    {
        $link = $links->onlyTrashed()->findOrFail($id);
        $link->forceDelete();
        return Redirect('/adminpanel/links')->withFlashMessage('Link deleted successfully');
    }

    public function destroyAllTrash(Link $links)
    {
        $link = $links->onlyTrashed();
        if(isset($link->get()[0]['attributes'])){
            $link->forceDelete();
            return Redirect('/adminpanel/links')->withFlashMessage('Links in the trash deleted successfully');
        }else{
            return Redirect::back()->with('cusMessage', 'Nothing in the trash');
        }
        
    }

    public function showTrash(Link $links)
    {
        $allTrash = $links->onlyTrashed()->get();
        return view('admin.link.trashdata', compact('allTrash'));
    }

    public function restore($id, Link $links)
    {
        $link = $links->onlyTrashed()->findOrFail($id);
        $link->restore();
        return Redirect::back()->withFlashMessage($link->title.' is back successfully');
    }

    public function anyData(Link $link)
    {
        
         $links = $link->all();

        return Datatables::of($links)
            
            ->editColumn('title', function ($model) {
               strlen($model->title) > 30 ? $LinkTitle = substr($model->title, 0,30).'...' : $LinkTitle = $model->title; 
                return $LinkTitle;
            })

            ->editColumn('pocket_id', function ($model) {
            strlen($model->pocket->name) > 25 ? $pocketName = substr($model->pocket->name, 0,25).'...' : $pocketName = $model->pocket->name; 
                return $pocketName;
            })


            ->editColumn('user_id', function ($model) {
            strlen($model->pocket->user->name) > 25 ? $userName = substr($model->pocket->user->name, 0,25).'...' : $userName = $model->pocket->user->name; 
                return $userName;
            })

            ->editColumn('action', function ($model) {
                $all = '<a href="' . url('/adminpanel/links/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . url('/adminpanel/links/' . $model->id . '/trash') . '" class="btn btn-warning btn-circle"><i class="fa fa-trash-o"></i></a> ';
                $all .= '<a href="' . url('/adminpanel/links/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>';
                
                return $all;
            })
            ->make(true);
    }

    /* user methods */
    public function UserCreate()
    {
       foreach(Auth::user()->pockets as $ob){
            $pockets[$ob->id]  = $ob->name;
        }
        if(empty($pockets)){
            return redirect('/pockets/create')->with('cusMessage', 'Please create pocket first');
        }
        return view('link.add', compact('pockets'));
    }

    public function userStore(Link $link, Request $request)
    {
        foreach(Auth::user()->pockets as $ob){
            $pockets[]  = $ob->id;
        }
         if(! in_array($request->pocket_id, $pockets)){
            return Redirect::back()->with('cusMessage', 'Pocket is not valid');
        }
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
                'title'     => 'required|min:4|max:255',
                'link'      => 'required|regex:'.$regex,
                'pocket_id' => 'required|integer'
                ]);
        $link->create($request->all());
        return redirect('/pockets/'.$request->pocket_id.'/show')->withFlashMessage('Link added successfully');
    }

    public function UserEdit($id, Link $links)
    {
       foreach(Auth::user()->pockets as $ob){
            $pockets[$ob->id]  = $ob->name;
        }
        $link = $links->findOrFail($id);
        if(Auth::user()->id != $link->pocket->user_id){
            return view('errors.404');
        }else{
            return view('link.edit', compact('link','pockets'));
        }
    }

    public function userUpdate($id, Link $links, Request $request)
    {
        foreach(Auth::user()->pockets as $ob){
            $pockets[]  = $ob->id;
        }
         if(! in_array($request->pocket_id, $pockets)){
            return Redirect::back()->with('cusMessage', 'Pocket is not valid');
        }
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
                'title'     => 'required|min:4|max:255',
                'link'      => 'required|regex:'.$regex,
                'pocket_id' => 'required|integer'
                ]);
        $link = $links->findOrFail($id);
        $link->update($request->all());
        return redirect('/pockets/'.$request->pocket_id.'/show')->withFlashMessage('Link added successfully');
    }

    public function userTrash($id, Link $links)
    {
        $link = $links->findOrFail($id);
        
        if(Auth::user()->id != $link->pocket()->get()[0]['user_id']){
            return view('errors.404');
        }else{
           $pocket = $link->pocket_id;
           $link->delete();
           return Redirect('/pockets/'.$pocket.'/show')->withFlashMessage('Link deleted successfully');
        }
    }
}
