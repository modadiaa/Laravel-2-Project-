<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;


class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::get();
        return view('Admin-panel.sliders.index',compact('sliders'));
    }

    public function store(Request $request){
           $sliders = new Slider;
            if( $image = $request->file('image')){
                $file_name = $image->getClientOriginalName();
                $request->image->move(public_path('uploads/sliders/'), $file_name);
                $sliders->image = $file_name;
            }
            $sliders->small_title =  $request->input('small_title');
            $sliders->big_title =  $request->input('big_title');
            $sliders->save();
            return redirect()->back()->with(['status' => 'تم الاضافة  بنجاح']);
    }


    public function update(Request $request){
            $sliders = Slider::where('id',$request->slide_id)->first();
            if($sliders){
                if($request->file('image')){
                    $image = $request->file('image');
                    $file_name = $image->getClientOriginalName();
                    $request->image->move(public_path('uploads/sliders/'), $file_name);
                    $sliders->image = $file_name;
                }
                $sliders->small_title = $request->small_title;
                $sliders->big_title = $request->big_title;
                $sliders->save();
            return redirect()->back()->with(['status' => 'تم التحديث   بنجاح']);
        }
    }


    public function destroy( Request $request , $id){
            $sliders =  Slider::find($id);
            $sliders = Slider::where('id',$request->slide_id)->first();
            if($sliders->image){
                $path = 'uploads/sliders/'.$sliders->image;
                if(File::exists($path)){
                    File::delete($path);
                 }
            }
            $sliders->delete();
            return redirect()->back()->with(['status' => 'تم الحذف  بنجاح']);
    }
}
