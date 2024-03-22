<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\File;



class VideoController extends Controller
{
    public function index(){
        $videos = Video::get();
        return view('Admin-panel.video.index',compact('videos'));
    }


    public function store(Request $request){
           $videos = new Video;
            if( $image = $request->file('image')){
                $file_name = $image->getClientOriginalName();
                $request->image->move(public_path('uploads/videos/'), $file_name);
                $videos->image = $file_name;
            }

            $videos->name =  $request->input('name');
            $videos->link =  $request->input('link');
            $videos->slug =  $request->input('slug');
            $videos->keyword =  $request->input('keyword');
            $videos->optionn =  $request->input('optionn');
            $videos->save();
            return redirect()->back()->with(['status' => 'تم الإضافة  بنجاح']);
    }


    public function update(Request $request){
            $videos = Video::where('id',$request->video_id)->first();
            if($videos){
                if($request->file('image')){
                    $image = $request->file('image');
                    $file_name = $image->getClientOriginalName();
                    $request->image->move(public_path('uploads/videos/'), $file_name);
                    $videos->image = $file_name;
                }
                $videos->name = $request->name;
                $videos->link = $request->link;
                $videos->slug = $request->slug;
                $videos->keyword = $request->keyword;
                $videos->optionn = $request->optionn;
                $videos->save();
            return redirect()->back()->with(['status' => 'تم تحديث   بنجاح']);
        }

    }


    public function destroy( Request $request , $id){
            $videos =  Video::find($id);
            $videos = Video::where('id',$request->video_id)->first();
            if($videos->image){
                $path = 'uploads/videos/'.$videos->image;
                if(File::exists($path)){
                    File::delete($path);
                 }
            }
            $videos->delete();
            return redirect()->back()->with(['status' => 'تم الحذف  بنجاح']);
    }

    /*public function destroy($id){
        $category =  Category::find($id);
        if($category->image){
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
             }
        }
        $category->delete();
        return redirect('/categories')->with('status' , "Category Deleted Successfully");

     }*/



}

