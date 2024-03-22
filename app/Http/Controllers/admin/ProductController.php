<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Spatie\Translatable\HasTranslations;
use Illuminate\Pagination\Paginator ;
use Illuminate\Support\Facades\File;




class ProductController extends Controller
{
    public function index(Request $request)
    {

       $products = Product::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like','%' . $request->search . '%')
                    //  ->orWhere('category_id', $request->category_id);
                     //->orWhere('category', 'like','%' . $request->search . '%')
           ;

        })->with('category:id,name')->paginate(2);

        return view('Admin-panel.products.index',compact('products'));

       // return view('Admin-panel.products.index')->with('products', $products);


    }

    public function store(Request $request){
            $product = new Product;
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->description = $request->description;
            $product->status = $request->status;
            $product->category_id = $request->category_id;
            $product->keyword =  $request->input('keyword');
            $product->optionn =  $request->input('optionn');

            if($request->file('image')){
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $request->image->move(public_path('uploads/products/'), $file_name);
                $product->image = $file_name;
                }
                $product->save();
            return redirect()->back()->with(['success' => 'تم اضافة المنتج بنجاح']);
        }


        public function update(Request $request){
                $product = Product::where('id',$request->product_id)->first();

                if($product){
                    if($request->file('image')){
                        $image = $request->file('image');
                        $file_name = $image->getClientOriginalName();
                        $request->image->move(public_path('uploads/products/'), $file_name);
                        $product->image = $file_name;
                    }
                    $product->name = $request->name;
                    $product->slug = $request->slug;
                    $product->description = $request->description;
                    $product->status = $request->status;
                    $product->category_id = $request->category_id;
                    $product->keyword = $request->keyword;
                    $product->optionn = $request->optionn;
                    $product->save();
                    return redirect()->back()->with(['success' => 'تم تحديث بيانات المنتج بنجاح']);
                }
                return redirect()->back()->with(['error' => 'عفوا المنتج غير صحيح']);

        }


        public function destroy( Request $request , $id){
            $product =  Product::find($id);
            $product = Product::where('id',$request->product_id)->first();
            if($product->image){
                $path = 'uploads/products/'.$product->image;
                if(File::exists($path)){
                    File::delete($path);
                 }
            }
            $product->delete();
            return redirect()->back()->with(['success' => 'تم حذف الصورة بنجاح']);
    }


}
