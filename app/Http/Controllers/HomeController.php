<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;
use App\Pocket;
use App\Share;
use App\User;
use App\Link;
use App\Slider;
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Follow $followers, Pocket $pocket, Share $share, User $member, Link $link, Slider $slider)
    {
        if(Auth::guest()){
            $members = $member->count();
            $pockets = $pocket->withTrashed()->count();
            $shares  = $share->count();
            $links   = $link->withTrashed()->count();
            $sliders = $slider->all();
            return view('welcome', compact('members', 'pockets', 'shares', 'links', 'sliders'));
        }else{
            $users = $followers->where('follow', Auth::user()->id)->orderBy('created_at', 'desc')->get()->toArray();
            if($users != null){
                foreach ($users as $user) {
                    $ids[] = $user['user_id'];
                }
            }else{
                $ids[] = 0;
            }
            $pockets =  $pocket->where('type', 0)->whereIn('user_id', $ids)->orderBy('created_at', 'desc')->paginate(15);
            return view('home', compact('pockets', 'home'));
        }
    }
}
