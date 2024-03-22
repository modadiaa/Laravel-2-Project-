<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::get();
        return view('Admin-panel.contacts.index',compact('contacts'));
    }

    public function store(Request $request){
        $contacts = new Contact;
        $contacts->name =  $request->input('name');
        $contacts->slug =  $request->input('slug');
        $contacts->email =  $request->input('email');
        $contacts->workk =  $request->input('workk');
        $contacts->address =  $request->input('address');
        $contacts->mobile =  $request->input('mobile');
        $contacts->phone =  $request->input('phone');
        $contacts->keyword =  $request->input('keyword');
        $contacts->optionn =  $request->input('optionn');
        $contacts->Facebook =  $request->input('Facebook');
        $contacts->twitter =  $request->input('twitter');
        $contacts->Youtube =  $request->input('Youtube');
        $contacts->Instagram =  $request->input('Instagram');
        $contacts->Google =  $request->input('Google');
        $contacts->telegram =  $request->input('telegram');

          $contacts->save();
          return redirect()->back()->with(['status' => 'تم الإضافة  بنجاح']);
        }

    public function update(Request $request){
            $contacts = Contact::where('id',$request->con_id)->first();
            if($contacts){
                if($request->file('image')){
                    $image = $request->file('image');
                    $file_name = $image->getClientOriginalName();
                    $request->image->move(public_path('uploads/contact/'), $file_name);
                    $contacts->image = $file_name;
                }

            $contacts->name =$request->name ;
            $contacts->email =$request->email ;
            $contacts->workk =$request->workk ;
            $contacts->address =$request->address ;
            $contacts->mobile=$request->mobile ;
            $contacts->phone =$request->phone ;
            $contacts->fax =$request->fax ;
            $contacts->keyword = $request->keyword;
            $contacts->optionn = $request->optionn;

            $contacts->Facebook =$request->Facebook ;
            $contacts->twitter =$request->twitter ;
            $contacts->Youtube =$request->Youtube ;
            $contacts->Instagram = $request->Instagram;
            $contacts->Google=$request->Google ;
            $contacts->telegram =$request->telegram;
            $contacts->save();
            return redirect()->back()->with(['status' => 'تم تحديث   بنجاح']);
        }
    }



    public function destroy(Request $request, $id){
        $contacts =  Contact::find($id);
        $contacts = Contact::where('id',$request->con_id)->first();
        $contacts->delete();
        return redirect()->back()->with(['status' => 'تم حذف البيانات بنجاح']);


    }

}
