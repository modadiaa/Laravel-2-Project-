<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function index(){
        $news = News::get();
        return view('Admin-panel.news.index',compact('news'));
    }

    public function store(Request $request){
        $news = new News;
        $news->name =  $request->input('name');
        $news->title =  $request->input('title');
        $news->slug =  $request->input('slug');
        $news->description =  $request->input('description');
        $news->keyword =  $request->input('keyword');
        $news->optionn =  $request->input('optionn');

          $news->save();
          return redirect()->back()->with(['success' => 'تم الاضافة  بنجاح']);
      }

      public function update(Request $request){
            $news = News::where('id',$request->nee_id)->first();
            $news->name = $request->name;
            $news->title = $request->title;
            $news->description = $request->description;
            $news->keyword = $request->keyword;
            $news->optionn = $request->optionn;
            $news->save();
        return redirect()->back()->with(['success' => 'تم تحديث   بنجاح']);


}


public function destroy( Request $request , $id){
        $news =  News::find($id);
        $news = News::where('id',$request->nee_id)->first();

        $news->delete();
        return redirect()->back()->with(['success' => 'تم حذف الصورة بنجاح']);
}


}
