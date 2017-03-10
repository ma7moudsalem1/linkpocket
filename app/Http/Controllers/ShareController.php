<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
use App\Pocket;
use Auth;
use DB;
class ShareController extends Controller
{
    public function create(Share $share,Pocket $pockets, Request $request)
    {
    	$this->validate($request, [
                'id' => 'required|integer',
                ]);
    	$pocket = $pockets->findOrFail($request->id);
    	if($pocket->type != 0){
    		return view('errors.404');
          die();
    	}
     $count = $share->where('user_id', Auth::user()->id)->where('pocket_id', $request->id)->count();
     if($count == 0){
        $share->create([
        'user_id'   => Auth::user()->id,
        'pocket_id' => $request->id
        ]);
     }
    	else{
        return null;
      }
    }

    public function getShare(Share $shares, Pocket $pocket)
    {
        $user = Auth::user()->id;
      $shares = $shares->where('user_id', $user)->orderBy('created_at', 'desc')->get()->toArray();
      if($shares != null){
          foreach ($shares as $share) {
              $ids[] = $share['pocket_id']; 
          }
    }else{
        $ids[] = 0;
    }
       $pockets =  $pocket->whereIn('id', $ids)->orderBy('created_at', 'desc')->paginate(15);
        return view('pocket.share', compact('shares', 'pockets'));
    }

    public function destroy($id, Share $shares)
    {
       $share = $shares->where('user_id', Auth::user()->id)->where('pocket_id', $id)->firstOrFail();
       $shares->where('user_id', Auth::user()->id)->where('pocket_id', $id)->delete();
        
    }
}
