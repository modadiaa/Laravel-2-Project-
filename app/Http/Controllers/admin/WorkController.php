<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;




class WorkController extends Controller
{
    /*public function index(){
        $works = Work::get();
        return view('Admin-panel.works.index',compact('works'));
    }*/

    public function index(Request $request)
    {
       $works = Work::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like','%' . $request->search . '%')
           ;
        })->paginate(10);
        return view('Admin-panel.works.index',compact('works'));
    }

    public function store(Request $request){
        $works = new Work;
        $works->name =  $request->input('name');
        $works->slug =  $request->slug;
        $works->description =  $request->input('description');
        $works->keyword =  $request->input('keyword');
        $works->optionn =  $request->input('optionn');

        if( $image = $request->file('image')){
            $file_name = $image->getClientOriginalName();
            $request->image->move(public_path('uploads/work/'), $file_name);
            $works->image = $file_name;
          }
         /* foreach ($request->file('images') as $imagefile) {
            $request->images->move(public_path('uploads/work/group/'), $file_names);
          }*/
          $works->save();
          return redirect()->back()->with(['success' => 'تم الاضافة  بنجاح']);
      }

      public function update(Request $request){
        $works = Work::where('id',$request->work_id)->first();

        if($works){
            if($request->file('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $request->image->move(public_path('uploads/work/'), $file_name);
                $works->image = $file_name;
            }
            $works->name = $request->name;
            $works->slug = $request->slug;
            $works->description = $request->description;
            $works->keyword = $request->keyword;
            $works->optionn = $request->optionn;
            $works->save();
            return redirect()->back()->with(['status' => 'تم تحديث بيانات  بنجاح']);
        }
        return redirect()->back()->with(['error' => 'عفوا  غير صحيح']);

}



      public function destroy( Request $request , $id){
        $works =  Work::find($id);
        $works = Work::where('id',$request->work_id)->first();
        if($works->image){
            $path = 'uploads/work/'.$works->image;
            if(File::exists($path)){
                File::delete($path);
             }
        }
        $works->delete();
        return redirect()->back()->with(['status' => 'تم حذف الصورة بنجاح']);
        }



}
