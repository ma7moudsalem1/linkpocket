<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Pocket;
use App\Link;
use App\Message;
use App\Share;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index(User $users, Pocket $pockets, Link $links, Message $messages, Contact $contacts, Share $shares)
    {

    	//user
    	$usersTotal  = $users->count();
    	$latestUsers = $users->take('8')->orderBy('created_at', 'desc')->get();

    	//shared pockets
    	$shareTotal = $shares->count();

    	//message
    	$messageTotal = $messages->count();

    	//links
    	$linkTotal = $links->withTrashed()->count();

    	//pockets
    	$latestPockets = $pockets->take('8')->orderBy('created_at', 'desc')->get();

    	//contacts
    	$latestContacts = $contacts->take('8')->orderBy('created_at', 'desc')->get();
    	$ContactTotal	= $contacts->count();
    	$thanks      	= $contacts->where('type', 1)->count();
    	$problems      	= $contacts->where('type', 2)->count();
    	$suggestions    = $contacts->where('type', 3)->count();
    	$questions      = $contacts->where('type', 4)->count();
    	$others         = $contacts->where('type', 5)->count();


    	$totalPockets		 = $pockets->withTrashed()->count();
    	$totleDeletepockets	 = $pockets->onlyTrashed()->count();

    	$totalPublicPoc    = $pockets->withTrashed()->where('type', 0)->count();
    	$totalDelPublicPoc = $pockets->onlyTrashed()->where('type', 0)->count();

    	$totalProtectedPoc    = $pockets->withTrashed()->where('type', 1)->count();
    	$totalDelProtectedPoc = $pockets->onlyTrashed()->where('type', 1)->count();

    	$totalPrivatePoc    = $pockets->withTrashed()->where('type', 2)->count();
    	$totalDelPrivatePoc = $pockets->onlyTrashed()->where('type', 2)->count();

    	$pocketsChart = $pockets->withTrashed()->select(DB::raw('COUNT(*) as counting , month '))->groupBy('month')->orderBy('month', 'asc')->get(); 
    	
    	
    	return view('admin.home.index', compact(

    		'usersTotal', 'shareTotal', 'messageTotal', 'linkTotal', 'pocketsChart', 'totalPockets', 'totleDeletepockets', 'totalPublicPoc', 'totalDelPublicPoc', 'totalProtectedPoc', 'totalDelProtectedPoc',
    		'totalPrivatePoc', 'totalDelPrivatePoc', 'latestUsers', 'latestPockets', 'latestContacts', 'ContactTotal','thanks', 'problems', 'suggestions', 'questions', 'others'

    		));
    }

    public function error()
    {
    	return view('admin.errors.404');
    }
}
