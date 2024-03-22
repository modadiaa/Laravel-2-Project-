<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;


class MessageController extends Controller
{
    public function index(){
        $message = Message::get();
        return view('Admin-panel.message.index',compact('message'));
    }
}
