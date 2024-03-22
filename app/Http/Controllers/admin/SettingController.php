<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class SettingController extends Controller
{
    public function index(){
        $setting = Setting::get();
        return view('Admin-panel.settings.index',compact('setting'));
    }

    public function store(Request $request){
           $setting = new Setting;
            $setting->title =  $request->input('title');
            $setting->email =  $request->input('email');
            $setting->save();
            return redirect()->back()->with(['status' => 'تم الإضافة  بنجاح']);
    }

    public function update(Request $request){
        $setting = Setting::where('id',$request->sett_id)->first();
            $setting->title = $request->title;
            $setting->email = $request->email;
            $setting->save();
        return redirect()->back()->with(['status' => 'تم التحديث    بنجاح']);
    }



    public function destroy( Request $request , $id){
        $setting =  Setting::find($id);
        $setting = Setting::where('id',$request->sett_id)->first();

        $setting->delete();
        return redirect()->back()->with(['status' => 'تم الحذف  بنجاح']);
}

}
