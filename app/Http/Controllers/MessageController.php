<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{


    public function store(Request $request){
        $message = new Message;
        $message->name =  $request->input('name');
        $message->email =  $request->input('email');
        $message->subject =  $request->input('subject');
        $message->message =  $request->input('message');

          $message->save();
          return redirect()->back()->with(['status' => 'تم ارسال رسالتك بنجاح  ']);
      }


}
