<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Redirect;
use Datatables;
class ContactController extends Controller
{

	public function index()
	{
		
		return view('admin.contact.index');
		
	}

    public function store(Request $request, Contact $contact)
    {
    	$this->validate($request,[
    			'name' 	=> 'required|min:3|max:255',
    			'email' =>	'required|email|max:255',
    			'message'	=> 'required|min:5',
    			'type'		=> 'required|integer'
    		]);
    	if(! in_array($request->type, [1,2,3,4,5])){
    		return Redirect::back()->with('cusMessage', 'Subject not valid');
    	}
    	$contact->create($request->all());
    	return Redirect::back()->withFlashMessage('Thanks we get your message');
    }

    public function show($id, Contact $contact)
    {
    	$message = $contact->findOrFail($id);
    	$message->update(['view' => 1]);
    	$type = getTypeMessage();
    	return view('admin.contact.show', compact('message', 'type'));
    }

    public function destroy($id, Contact $contact)
    {
    	$contact->findOrFail($id)->delete();
    	return Redirect('/adminpanel/contacts')->withFlashMessage('Message deleted successfully');
    }

    public function anyData(Contact $contact)
    {
        
             $contacts = $contact->all();

        return Datatables::of($contacts)
            
            ->editColumn('type', function ($model) {
            	$mType = getTypeMessage();
                return $mType[$model->type];
            })

            ->editColumn('view', function ($model) {
                return $model->view == 0 ? 'New message' : 'Old message';
            })

            ->editColumn('action', function ($model) {
                $all = '<a href="' . url('/adminpanel/contacts/' . $model->id . '/show') . '" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a> ';
              
                $all .= '<a href="' . url('/adminpanel/contacts/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" id="confirmation"><i class="fa fa-trash-o"></i></a>';
                
                return $all;
            })
            ->make(true);
    }

}
