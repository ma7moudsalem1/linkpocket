<?php

namespace App\Http\Controllers;
use App\Pocket;
use App\Link;

use Redirect;
use Datatables;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PocketRequst;
use Illuminate\Support\Facades\Hash;
use Session;
class PocketController extends Controller
{
    public function index()
    {
    	return view('admin.pocket.index');
    }

    public function create()
    {
    	return view('admin.pocket.add');
    }

    public function store(Pocket $pocket, PocketRequst $request)
    {
    	$user = Auth::user();
    	if($request->password)
    	{
    		$data = [
    			'name' 	   => $request->name,
    			'user_id'  => $user->id,
    			'descrip'  => $request->descrip,
    			'type' 	   => $request->type,
    			'password' => $request->password,
                'month'    => date('m')
    		];
    	}else{
    		$data = [
    			'name' 	   => $request->name,
    			'user_id'  => $user->id,
    			'descrip'  => $request->descrip,
    			'type' 	   => $request->type,
                'month'    => date('m')
    		];
    	}
    	$pocket->create($data);
    	return Redirect('/adminpanel/pockets')->withFlashMessage('Pocket created successfully');
    }

    public function edit($id, Pocket $pockets)
    {
    	$pocket = $pockets->findOrFail($id);
    	return view('admin.pocket.edit', compact('pocket'));
    }

    public function update($id, Pocket $pockets, PocketRequst $request)
    {
    	$pocket = $pockets->findOrFail($id);
    	$data = $request->all();
    	if($request->password == null){
    		$data = [
    			'name' 	   => $request->name,
    			'descrip'  => $request->descrip,
    			'type' 	   => $request->type
    		];
    	}
    	$pocket->update($data);
    	return Redirect::back()->withFlashMessage($pocket->name.' Updated successfully');
    }

    public function destroy($id, Pocket $pockets)
    {
    	$pocket = $pockets->findOrFail($id);
        foreach ($pocket->links as $li) {
            $li->forceDelete();
        }
    	$pocket->forceDelete();
    	return Redirect('/adminpanel/pockets')->withFlashMessage('Pocket deleted successfully');
    }

    public function trash($id, Pocket $pockets)
    {
        $pocket = $pockets->findOrFail($id);
        foreach ($pocket->links as $li) {
            $li->delete();
        }
        
        
        $pocket->delete();
        return Redirect('/adminpanel/pockets')->withFlashMessage('Pocket moved to the trash');
    }

    public function destroyTrash($id, Pocket $pockets, Link $link)
    {
        $pocket = $pockets->onlyTrashed()->findOrFail($id);
        $lpocket = $link->onlyTrashed()->where('pocket_id', $pocket->id)->get();
     
        foreach ($lpocket as $li) {
            
            $li->forceDelete();
        }
        $pocket->forceDelete();
        return Redirect('/adminpanel/pockets')->withFlashMessage('Pocket deleted successfully');
    }

    public function destroyAllTrash(Pocket $pockets)
    {
        $pocket = $pockets->onlyTrashed();
        if(isset($pocket->get()[0]['attributes'])){
            $pocket->forceDelete();
            return Redirect('/adminpanel/pockets')->withFlashMessage('Pockets in the trash deleted successfully');
        }else{
            return Redirect::back()->with('cusMessage', 'Nothing in the trash');
        }
        
    }

    public function showTrash(Pocket $pockets)
    {
        $allTrash = $pockets->onlyTrashed()->get();
        return view('admin.pocket.trashdata', compact('allTrash'));
    }

    public function restore($id, Pocket $pockets, Link $link)
    {
        $pocket = $pockets->onlyTrashed()->findOrFail($id);
        $lpocket = $link->onlyTrashed()->where('pocket_id', $pocket->id)->restore();
     
        $pocket->restore();
        return Redirect::back()->withFlashMessage($pocket->name.' is back successfully');
    }

    public function anyData(Pocket $pocket)
    {
        
         $pockets = $pocket->all();

        return Datatables::of($pockets)
            
            ->editColumn('name', function ($model) {
               strlen($model->name) > 30 ? $pocketName = substr($model->name, 0,30).'...' : $pocketName = $model->name; 
                return $pocketName;
            })

            ->editColumn('type', function ($model) {
                return GetPocketType($model->type);
            })

            ->editColumn('user_id', function ($model) {
            strlen($model->user->name) > 25 ? $userName = substr($model->user->name, 0,25).'...' : $userName = $model->user->name; 
                return $userName;
            })

            ->editColumn('action', function ($model) {
                $all = '<a href="' . url('/adminpanel/pockets/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . url('/adminpanel/links/' . $model->id . '/show') . '" class="btn btn-primary btn-circle"><i class="fa fa-external-link-square"></i></a> ';
                $all .= '<a href="' . url('/adminpanel/pockets/' . $model->id . '/trash') . '" class="btn btn-warning btn-circle"><i class="fa fa-trash-o"></i></a> ';
                $all .= '<a href="' . url('/adminpanel/pockets/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>';
                
                return $all;
            })
            ->make(true);
    }

    /* User Methods */
    public function mypockets()
    {
        $pockets = Auth::user()->pockets()->paginate(12);
        return view('pocket.pocket', compact('pockets'));
    }

    public function UserCreate()
    {
       return view('pocket.add');
    }

    public function UserStore(Pocket $pocket, PocketRequst $request)
    {
        $user = Auth::user();
        if(! in_array($request->type, [0,1,2])){
            return Redirect::back()->with('cusMessage', 'Type is not valid');
        }
        if($request->type == 1)
        {
            if(strlen($request->password) < 6){
                return Redirect::back()->with('cusMessage', 'Passowrd should be at least 6 char');
            }
            $data = [
                'name'     => $request->name,
                'user_id'  => $user->id,
                'descrip'  => $request->descrip,
                'type'     => $request->type,
                'password' => $request->password,
                'month'    => date('m')
            ];
        }else{
            $data = [
                'name'     => $request->name,
                'user_id'  => $user->id,
                'descrip'  => $request->descrip,
                'type'     => $request->type,
                'month'    => date('m')
            ];
        }
        $pocket->create($data);
        return Redirect('/pockets')->withFlashMessage('Pocket created successfully');
    }

    public function UserEdit($id, Pocket $pockets)
    {

        $pocket = $pockets->findOrFail($id);
        if(Auth::user()->id != $pocket->user_id){
            return view('errors.404');
        }else{
        return view('pocket.edit', compact('pocket'));
         }
    }

    public function userTrash($id, Pocket $pockets)
    {
        $pocket = $pockets->findOrFail($id);
        if(Auth::user()->id != $pocket->user_id){
            return view('errors.404');
        }else{
            foreach ($pocket->links as $li) {
                $li->delete();
            }
            
            $pocket->delete();
            return Redirect('/pockets')->withFlashMessage('Pocket deleted successfully');
        }
    }

    public function userShow($id, Pocket $pockets, Link $link)
    {
        $pocket = $pockets->findOrFail($id);
        $links = $link->where('pocket_id', $id)->paginate(15);
        //public
        if($pocket->type == 0){
            return view('pocket.links', compact('pocket', 'links'));
        //protected
        }elseif($pocket->type == 1){
            if(Auth::guest() || Auth::user()->id != $pocket->user_id){

                if(Session::has('auth') && Session::get('auth') == $pocket->id){
                    return view('pocket.links', compact('pocket', 'links'));
                }else{
                    
                    return view('pocket.auth', compact('pocket'));
                }
            }else{
                return view('pocket.links', compact('pocket', 'links'));
            }
        }
        // private
        else{
            if(Auth::guest() || Auth::user()->id != $pocket->user_id){
                return view('errors.404');
            }else{
                return view('pocket.links', compact('pocket', 'links'));
            }
        }
    }

    public function pocketAuth(Pocket $pockets, Link $link, Request $request)
    {
        if(isset($request->pocket_id)){
            $id = $request->pocket_id;
            $pocket = $pockets->findOrFail($id);
             if(! Hash::check($request->password, $pocket->password))
            {
                return Redirect::back()->with('cusMessage', 'Passowrd not valid.');     

            }else{
                Session::put('auth', $pocket->id);
                return Redirect('/pockets/'.$pocket->id.'/show');
            }

        }
    }

    public function take(Pocket $pocket, Link $links, PocketRequst $request)
    {
        $user = Auth::user();
        if(! in_array($request->type, [0,1,2])){
            return Redirect::back()->with('cusMessage', 'Type is not valid');
        }
        if($request->type == 1)
        {
            if(strlen($request->password) < 6){
                return Redirect::back()->with('cusMessage', 'Passowrd should be at least 6 char');
            }
            $data = [
                'name'     => $request->name,
                'user_id'  => $user->id,
                'descrip'  => $request->descrip,
                'type'     => $request->type,
                'password' => $request->password,
                'month'    => date('m')
            ];
        }else{
            $data = [
                'name'     => $request->name,
                'user_id'  => $user->id,
                'descrip'  => $request->descrip,
                'type'     => $request->type,
                'month'    => date('m')
            ];
        }
       $newPocketId =  $pocket->create($data)->id;
       $link = $links->where('pocket_id',$request->pocketId)->get();
       if(! empty($link)){
        foreach ($link as $RenewLink) {
            $newLink = $RenewLink->replicate();
            $newLink->pocket_id = $newPocketId;
            $newLink->save();
        }
       }
       
    }

    public function search(Request $request, Pocket $pocket)
    {
        $this->validate($request, [
            'search'    => 'required|min:3|max:60'
            ]);
        $text = $request->search;
        $pockets = $pocket->where('name', 'like', '%'.$text.'%')->where('type', 0)->orderBy('created_at', 'desc')->paginate(15);
        return view('pocket.search', compact('text', 'pockets'));
    }

}
