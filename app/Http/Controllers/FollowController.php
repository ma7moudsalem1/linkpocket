<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
use Auth;
class FollowController extends Controller
{
    public function follow($id,Request $request, User $users, Follow $follows)
    {
        $follow = $request->follow;
        $follower = Auth::user()->id;
        $update = false;
        $this->validate($request, [
                'follow' => 'required|integer',
                ]);
        $followCheck = $follows->where('user_id', $follow)->where('follow', $follower)->count();
        $followData = $follows->where('user_id', $follow)->where('follow', $follower)->first();

        if($follow == $follower){
                return view('errors.404');
                die();
            }

            if(!$follow){
                return view('errors.404');
                die();
            }

        if($followCheck > 0){
            $update = true;
            $followData->delete();
            return null;
        }else{
        
            $follows->create([
                    'follow' => $follower,
                    'user_id'   => $follow
                ]);
            
        }
        return null;
    }

    public function show(Follow $follow)
    {
        return view('user.follow');
    }
}
