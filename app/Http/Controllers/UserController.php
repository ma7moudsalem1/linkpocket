<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Http\Requests\AddUserRequest;
use App\User;
use App\Pocket;
use App\Follow;
use App\Link;
use App\Share;
use Redirect;
use Datatables;
class UserController extends Controller
{
    public function index()
    {
    	if(Auth::user()->type == 1)
    	{
    		return view('admin.user.index');
    	}
    	else{
    		return redirect('/adminpanel/404');
    	}
    }

    public function create()
    {
    	if(Auth::user()->type == 1)
    	{
    		return view('admin.user.add');
    	}
    	else{
    		return redirect('/adminpanel/404');
    	}
    }

    public function store(AddUserRequest $request, User $user)
    {
    	if(Auth::user()->type == 1)
    	{
	       $user->create([
	            'name' => $request->name,
	            'email' => $request->email,
	            'username' => $request->username,
	            'gender' => $request->gender,
	            'type' => $request->type,
                'bio'       => $request->bio,
	            'password' => $request->password,
	        ]);
        return Redirect('/adminpanel/users')->withFlashMessage('User added successfully');
        }
    	else{
    		return redirect('/adminpanel/404');
    	}
    }

    public function edit($id, User $users)
    {
    	if(Auth::user()->type == 1)
    	{
    		if($id == 1){
    			if(Auth::user()->id != 1){
    				return redirect('/adminpanel/404');
    			}
    		}

    		$user = $users->findOrFail($id);
		    if ($user == null) {
		        return redirect('/adminpanel/404');
		    }
		   return view('admin.user.edit', compact('user'));
    	}
    	else{
    		return redirect('/adminpanel/404');
    	}
    }

    public function update($id, User $users, Request $request)
    {
    	if(Auth::user()->type == 1)
    	{
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
                'gender' => 'required|integer',
                'bio'    => 'max:255',
                'email'   => 'required|email',
                'username' => 'regex:/([A-Za-z0-9 ])+/|regex:/^\S*$/u|required'
                ]);
	      $userUpdate = $users->findOrFail($id);

          if($request->username != $userUpdate->username){
               $userUniq = $users->where('username', $request->username)->first();
                if($userUniq != null){
                    return Redirect::back()->with('cusMessage', 'Username updated already exists');
                }
            }

            if($request->email != $userUpdate->email){
                $emailUniq = $users->where('email', $request->email)->first();
                if($emailUniq != null){
                    return Redirect::back()->with('cusMessage', 'E-mail updated already exists');
                }
            }

            if(Auth::user()->id == 1 && $request->type != 1){
                return Redirect::back()->with('cusMessage', 'Not able to change main admin');
            }

	      $userUpdate->fill($request->all())->save();
        return Redirect::back()->withFlashMessage('User updated successfully');
        }
    	else{
    		return redirect('/adminpanel/404');
    	}
    }

    public function updatePassword(User $users, Request $request)
    {
    	if($request->user_id == 1){
    			if(Auth::user()->id != 1){
    				return redirect('/adminpanel/404');
    				die();
    			}
    		}

    	if(Auth::user()->type == 1)
    	{
            $this->validate($request, [
                'password' => 'required|min:6'
                ]);
	      $userUpdate = $users->findOrFail($request->user_id);
	      $userUpdate->fill(['password' => $request->password])->save();
        return Redirect::back()->withFlashMessage('User password updated successfully');
        }
    	else{
    		return redirect('/adminpanel/404');
    	}
    }

    public function destroy($id, User $users, Link $links, Pocket $pockets)
    {
        if(Auth::user()->type == 1)
        {
            if($id == 1){
                return redirect('/adminpanel/404');
                die();
            }

            $user = $users->find($id);
            if ($user == null) {
                return redirect('/adminpanel/404');
            }

            $pocket = $pockets->where('user_id',$user->id)->get();
            foreach ($pocket as $value) {
                $link = $links->where('pocket_id', $value->id)->forceDelete();
            }
            
           $user->pockets()->forceDelete();
           $user->delete();
           return redirect('/adminpanel/users')->withFlashMessage('User deleted successfully');
        }
        else{
            return redirect('/adminpanel/404');
        }
    }

    public function anyData(User $user)
    {
        if(Auth::user()->type == 1)
        {
             $users = $user->all();

        return Datatables::of($users)
            
            ->editColumn('type', function ($model) {
                return GetUserType($model->type);
            })
            ->editColumn('action', function ($model) {
                $all = '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                if($model->id != 1){
                    $all .= '<a href="' . url('/adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" id="confirmation"><i class="fa fa-trash-o"></i></a>';
                }
                return $all;
            })
            ->make(true);

        }
        else{
            return redirect('/adminpanel/404');
        }
    }


    /*  User methods  */
    public function editProfile()
    {
        return view('user.edit');
    }

    public function updateUserPass(Request $request)
    {
        $user = Auth::user();
        
        if(! Hash::check($request->old, $user->password))
        {
            return Redirect::back()->with('cusMessage', 'The old password not matched.');     

        }else{
             $this->validate($request, [
                'password' => 'required|min:6'
                ]);
             $user->update(['password' => $request->password]);
            return Redirect::back()->withFlashMessage('password updated successfully');
        }
        
    }

    public function updateAccount(User $users, Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
                'name' => 'required|min:4|max:255',
                'gender' => 'required|integer',
                'bio'    => 'max:255',
                'email'   => 'required|email'
                ]);
        if($request->email != $user->email){
            $emailUniq = $users->where('email', $request->email)->first();
            if($emailUniq != null){
            return Redirect::back()->with('cusMessage', 'This email already exists');
            }
        }
        $user->update($request->all());
        return Redirect::back()->withFlashMessage('password updated successfully');
    }

    public function profile($username, User $users)
    {
        $user = $users->where('username', $username)->first();
        if($username == 'admin'){
            if(Auth::guest()){
                return view('errors.404');
            }
            if(Auth::user()->username != 'admin'){
                return view('errors.404');
            }
        }
        if(!empty($user)){
            if(Auth::guest()){
                $pockets = $user->pockets()->where('type', 0)->paginate(15);
            }elseif(Auth::user()->username != $username){
                $pockets = $user->pockets()->where('type', 0)->paginate(15);
            }else{
                $pockets = $user->pockets()->orderBy('created_at', 'desc')->paginate(15);
            }
            
            return view('profile.profile', compact('user', 'pockets'));
            
        }else{
            return view('errors.404');
        }
    }

    public function numbers(Share $share, Follow $follows)
    {
        $user = Auth::user()->id;
        $pockets = Auth::user()->pockets()->count();
        $shares  = $share->where('user_id', $user)->count();
        $LastShare  = $share->where('user_id', $user)->orderBy('created_at', 'desc')->first();
        $follow  =  $follows->where('user_id', $user)->count();
        $LastFollow  =  $follows->where('user_id', $user)->orderBy('created_at', 'desc')->first();

        $shares > 0 ?  $shareTime = $LastShare->created_at : $shareTime = 0;
        $follow > 0 ?  $followTime = $LastFollow->created_at : $followTime = 0;
        
        return view('user.numbers', compact('pockets', 'shares', 'shareTime', 'follow', 'followTime'));
    }

}
