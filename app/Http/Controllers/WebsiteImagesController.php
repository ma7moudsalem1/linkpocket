<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteImages;
use Auth;
use Redirect;
use Intervention\Image\Facades\Image;
class WebsiteImagesController extends Controller
{
    public function index(WebsiteImages $web)
    {
    	if(Auth::user()->type == 1)
    	{
    		$websiteImages = $web->all();
    		return view('admin.image.index', compact('websiteImages'));
    	}
    	else{
    		return view('admin.errors.404');
    	}
    }

    public function edit($id, WebsiteImages $web)
    {
    	if(Auth::user()->type == 1)
    	{
    		$websiteImage = $web->findOrFail($id);
    		return view('admin.image.edit', compact('websiteImage'));
    	}
    	else{
    		return view('admin.errors.404');
    	}
    }

    public function update(WebsiteImages $web, Request $request)
    {
    	$imageData = $web->findOrFail($request->imgId);
    	$this->validate($request, [ 'image' => 'required|mimes:png' ], [ 'Image is empty or this is not png image please check your file and try again' ]);
    	$image = Image::make($request->file('image'));
        if($imageData->size != 0){
    	$image->resize($imageData->size, null , function($ratio){
              $ratio->aspectRatio();
          });
        }
    	$image->save(public_path('website/img/'. $imageData->image));
    	return Redirect('/adminpanel/images')->withFlashMessage('Image updated successfully');
    }
   
}
