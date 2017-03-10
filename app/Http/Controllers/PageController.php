<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Datatables;
use Auth;
use App\Page;
class PageController extends Controller
{
    public function index()
    {
    	if(Auth::user()->type == 1)
    	{
    		return view('admin.page.index');
    	}
    	else{
    		return view('admin.errors.404');
    	}
    }

    public function anyData(Page $page)
    {
        if(Auth::user()->type == 1)
        {
             $pages = $page->all();

        return Datatables::of($pages)
            
            ->editColumn('body', function ($model) {
                return strlen($model->body) > 30 ? substr($model->body, 0, 30).'...' : $model->body;
            })
            ->editColumn('action', function ($model) {
                $all = '<a href="' . url('/adminpanel/pages/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
                return $all;
            })
            ->make(true);

        }
        else{
            return redirect('/adminpanel/404');
        }
    }

    public function edit($id, Page $pages)
    {
    	if(Auth::user()->type == 1)
    	{
    		$page = $pages->findOrFail($id);
    		return view('admin.page.edit', compact('page'));
    	}
    	else{
    		return view('admin.errors.404');
    	}
    }

    public function update(Page $pages, Request $request)
    {
    	if(Auth::user()->type == 1)
    	{
    		$this->validate($request, [
                'title' => 'required|min:4|max:50',
                'id' 	=> 'required|integer',
                'body'  => 'required|min:10'
                ]);
    		$id = $request->id;
    		$page = $pages->findOrFail($id);
    		$page->update([
    			'title'	=> $request->title,
    			'body'	=> $request->body
    			]);
            if($request->descrip != null || $request->keywords != null){
                $page->update([
                'descrip' => $request->descrip,
                'keywords'  => $request->keywords
                ]);
            }
    		return Redirect('/adminpanel/pages')->withFlashMessage('Page updated successfully');
    	}
    	else{
    		return view('admin.errors.404');
    	}
    }

    public function contact()
    {
    	return view('page.contact');
    }

    public function about()
    {
        return view('page.about');
    }
}
