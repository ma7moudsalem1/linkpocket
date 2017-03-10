<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Redirect;
use Auth;
use Intervention\Image\Facades\Image;
class SliderController extends Controller
{
    public function index(Slider $slider)
    {
    	if(Auth::user()->type == 1){
    		$sliders = $slider->all();
    		return view('admin.slider.index', compact('sliders'));
    	}else{
    		return view('admin.errors.404');
    	}
    	
    }

    public function create()
    {
    	if(Auth::user()->type == 1){
    		return view('admin.slider.add');
    	}else{
    		return view('admin.errors.404');
    	}
    	
    }

    public function store(Slider $slider, Request $request)
    {
    	$this->validate($request, [
    		'img'	=> 'required|mimes:png,jpg,jpeg,gif',
    		'body'	=> 'required|min:10|max:300'
    		]);
    	$imageName = time().'_'.$request->file('img')->getClientOriginalName();
    	$image = Image::make($request->file('img'));
    	$image->resize(null, 450 , function($ratio){
              $ratio->aspectRatio();
          });
    	$image->save(public_path('website/img/slider/'. $imageName));
    	$slider->create([
    		'img'  => $imageName,
    		'body' => $request->body
    		]);
    	return Redirect('/adminpanel/sliders')->withFlashMessage('Slider added successfully');
    }

    public function edit($id, Slider $sliders)
    {
    	if(Auth::user()->type == 1){
    		$slider = $sliders->findOrFail($id);
    		return view('admin.slider.edit', compact('slider'));
    	}else{
    		return view('admin.errors.404');
    	}
    	
    }

    public function update($id, Slider $sliders, Request $request)
    {
    	$slider = $sliders->findOrFail($id);
    	$this->validate($request, [
    		'body'	=> 'required|min:10|max:300',
    		]);
    	$slider->update([
    		'body' => $request->body
    		]);
    	if($request->img != null){
    		$this->validate($request, [
    		'img'	=> 'mimes:png,jpg,jpeg,gif'
    		]);
    		$imageName = time().'_'.$request->file('img')->getClientOriginalName();
	    	$image = Image::make($request->file('img'));
	    	$image->resize(null, 450 , function($ratio){
	              $ratio->aspectRatio();
	          });
	    	$image->save(public_path('website/img/slider/'. $imageName));
	    	$slider->update([
    		'img' => $imageName
    		]);
    	}
    	return Redirect::back()->withFlashMessage('Slider updated successfully');
    }

    public function destroy($id, Slider $slider)
    {
    	if(Auth::user()->type == 1){
    		$count = $slider->count();
    		if($count > 1){
	    		$s = $slider->findOrFail($id);
	    		$s->delete();
	    		return Redirect('/adminpanel/sliders')->withFlashMessage('Slider deleted successfully');
    		}else{
    			return Redirect('/adminpanel/sliders')->with('cusMessage', 'you can not delete last slider');
    		}
    	}else{
    		return view('admin.errors.404');
    	}
    }
}
