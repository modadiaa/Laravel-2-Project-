<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        return view('Admin-panel.categories.index',compact('categories'));
    }

    public function store(Request $request){
        $categories = new Category;
        $categories->name =  $request->input('name');
        $categories->slug =  Str::slug($request->slug);
        $categories->description =  $request->input('description');

        if( $image = $request->file('image')){
            $file_name = $image->getClientOriginalName();
            $request->image->move(public_path('uploads/category/'), $file_name);
            $categories->image = $file_name;
          }
          $categories->parent =  $request->input('parent');
          $categories->keyword =  $request->input('keyword');
          $categories->optionn =  $request->input('optionn');
          $categories->save();
          return redirect()->back()->with(['status' => 'تم الاضافة  بنجاح']);
      }


      public function update(Request $request){
            $categories = Category::where('id',$request->cat_id)->first();
            if($categories){
                if($request->file('image')){
                    $image = $request->file('image');
                    $file_name = $image->getClientOriginalName();
                    $request->image->move(public_path('uploads/category/'), $file_name);
                    $categories->image = $file_name;
                }
                $categories->name= $request->name;
                $categories->description = $request->description;
                $categories->slug = Str::slug($request->slug);
                $categories->keyword = $request->keyword;
                $categories->optionn = $request->optionn;
                $categories->save();

            return redirect()->back()->with(['status' => 'تم تحديث بيانات القسم بنجاح']);
        }
        return redirect()->back()->with(['status' => 'عفوا المنتج غير صحيح']);

    }

    public function destroy( Request $request , $id){
        $categories =  Category::find($id);
        $categories = Category::where('id',$request->cat_id)->first();
        if($categories->image){
            $path = 'uploads/category/'.$categories->image;
            if(File::exists($path)){
                File::delete($path);
             }
        }
        $categories->delete();
        return redirect()->back()->with(['status' => 'تم حذف الصورة بنجاح']);
}


}
