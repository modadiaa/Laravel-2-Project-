<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;


class AboutsController extends Controller
{
    public function index(){
        $about = About::get();
        return view('layouts.site.about',compact('about'));
    }
}
