<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\About;
use App\Models\Work;
use App\Models\News;
use App\Models\Video;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Setting;

class HomepageController extends Controller
{
    public function index(){
        $about = About::get();
        $setting = Setting::get();
        return view('layouts.site.site' , compact('about','setting'));
    }

    public function about(){
        $about = About::get();
        return view('layouts.site.about' , compact('about'));
    }

    public function video(){
        $video = Video::get();
        return view('layouts.site.video' , compact('video'));
    }

    public function contact(){
        $contact = Contact::get();
        return view('layouts.site.contact' , compact('contact'));
    }

    public function newss(){
        $new = News::get();
        return view('layouts.site.new', compact('new'));
    }

    public function viewnewss($slug){
        $new =  News::get();
            $new = News::where('slug', $slug)->first();
            if($new){
            $final_new = News::where('slug', $slug)->get();
            return view('layouts.site.final_new', compact('new','final_new'));
           }
    }



    public function category(){
        $category =  Category::get();
        return view('layouts.site.category', compact('category'));
    }

    public function viewcategory($slug){
        if(Category::with('products')->where('slug',$slug)->exists())
        {
            $category = Category::with('products')->where('slug', $slug)->first();
            $products = Product::where('category_id',$category->id)->get();
            return view('layouts.site.productss', compact('category','products'));
        }
       }

       public function productview( $slug, $prod_slug){
        $category = Category::with('products')->where('slug', $slug)->first();
        if($category){
            $products = Product::with('category')->where('slug', $prod_slug)->get();
          return view('layouts.site.finalproductss',compact('category' ,'products'));
      }else {
          return redirect()->route()->back();
      }
    }


    public function work(){
        $works = Work::get();
        return view('layouts.site.work',compact('works'));
    }

    public function viewwork($slug){
        $works =  Work::get();
            $works = Work::where('slug', $slug)->first();
            if($works){
            $final_work = Work::where('slug', $slug)->get();
            return view('layouts.site.final_work', compact('works','final_work'));

    }


}





    public function logout(){
        auth('web')->logout();
        return redirect(route('login'));
    }
}
