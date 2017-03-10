<?php

namespace App\Http\Controllers;

use App\SiteSetting;
use Illuminate\Http\Request;
use Redirect;
use Auth;

class SiteSettingController extends Controller
{
    public function index(SiteSetting $setting)
    {
    	if(Auth::user()->type == 1)
    	{
    		$siteSetting = $setting->all();
    		return view('admin.sitesetting.index', compact('siteSetting'));
    	}else{
    		return Redirect('/adminpanel/404');
    	}
    }

    public function store(Request $request, SiteSetting $setting){

      foreach (array_except($request->toArray(), ['_token', 'submit']) as $key => $req) {
          $sieSettingsUpdate = $setting->where('name', $key)->get()[0];
          $sieSettingsUpdate->fill(['value' => $req])->save();
      }
      return Redirect::back()->withFlashMessage('Site Settings Updated successfully.');
    }
}
