<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Redirect;
use Auth;
class MessageController extends Controller
{
    public function create(Message $Messages, Request $request, User $users)
    {
    	 $this->validate($request, [
                'reciever' => 'required|integer',
                'messageBody' => 'required|max:320'
                ]);
    	 $id = $request->reciever;
    	 $token = $request->_token;
    	 $sender = Auth::user()->id;
    	 $body = $request->messageBody;
    	 $user = $users->findOrFail($id);
    	 $Messages->create([
    	 		'user_id' => $sender,
    	 		'user_id_reciever' => $id,
    	 		'message' => $body
    	 	]);
    	 //return response()->json(['message' => 'Message sent'], 200);
    }

    public function index(Message $message)
    {
    	$messages = $message->where('user_id_reciever', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
    	return view('message.index', compact('messages'));
    }
}
