<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function index(){
        $about = About::get();
        return view('Admin-panel.about.index',compact('about'));
    }

    public function store(Request $request){
        $about = new About;
              if( $image = $request->file('image')){
                $file_name = $image->getClientOriginalName();
                $request->image->move(public_path('uploads/about/'), $file_name);
                  $about->image = $file_name;
              }
              $about->name =  $request->input('name');
              $about->description =  $request->input('description');
              $about->title =  $request->input('title');
              $about->slug =  $request->input('slug');
              $about->keyword =  $request->input('keyword');
              $about->optionn =  $request->input('optionn');
              $about->save();
              return redirect()->back()->with(['status' => 'تم الاضافة  بنجاح']);
        }


        public function update(Request $request){
            $about = About::where('id',$request->abo_id)->first();
            if($about){
                if($request->file('image')){
                    $image = $request->file('image');
                    $file_name = $image->getClientOriginalName();
                    $request->image->move(public_path('uploads/about/'), $file_name);
                    $about->image = $file_name;
                }
                $about->name = $request->name;
                $about->description = $request->description;
                $about->title = $request->title;
                $about->slug = $request->slug;
                $about->keyword = $request->keyword;
                $about->optionn = $request->optionn;
                $about->save();
            return redirect()->back()->with(['status' => 'تم تحديث بيانات عن الشركة بنجاح']);
        }
    }

    public function destroy( Request $request , $id){
        $about =  About::find($id);
        $about = About::where('id',$request->abo_id)->first();
        if($about->image){
            $path = 'uploads/about/'.$about->image;
            if(File::exists($path)){
                File::delete($path);
             }
        }
        $about->delete();
        return redirect()->back()->with(['status' => 'تم الحذف  بنجاح']);
}

}
