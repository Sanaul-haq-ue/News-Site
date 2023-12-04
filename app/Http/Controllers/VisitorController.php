<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactBody;
use App\Models\H_F_Wiget;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use function Ramsey\Collection\Map\put;


class VisitorController extends Controller
{
    private static $visitorInfo,$visitorOldPass;


    public function visitor_registration(){
        $popularPosts = Blog::orderBy('count', 'desc')->get();

        return view('front.visitor.visitor-register',[
            'categories' => Category::where('status', 1)->get(),
            'headerSetting' => H_F_Wiget::find(1)->first(),
            'contact_body' => ContactBody::find(1)->first(),
            'popularPosts'=>$popularPosts,
        ]);
    }

    public function saveVisitor(Request $request){

        $validator = Validator::make($request->all(),[
            'password' => 'required|min:8|confirmed',
        ]);


        if ($validator->passes()){
            Visitor::saveVisitor($request);
            return redirect()->route('home');
        }else{
            return back()->withErrors($validator);
        }
    }

    public function logoutVisitor(){
        Session::forget('visitorId');
        Session::forget('visitorName');
        return back();
    }

    public function loginVisitor(){
        $popularPosts = Blog::orderBy('count', 'desc')->get();

        return view('front.visitor.visitor-login', [
            'categories' => Category::where('status', 1)->get(),
            'headerSetting' => H_F_Wiget::find(1)->first(),
            'contact_body' => ContactBody::find(1)->first(),
            'popularPosts'=>$popularPosts,
        ]);
    }

    public function checkVisitor(Request $request){
        self::$visitorInfo = Visitor::where('email',$request->email)->first();

        if (self::$visitorInfo){
            self::$visitorOldPass = self::$visitorInfo->password;

            if (Hash::check($request->password,self::$visitorOldPass)){
                Session::put('visitorId',self::$visitorInfo->id);
                Session::put('visitorName',self::$visitorInfo->first_name);
                return redirect()->route('home');
            }else{
                return back()->with('message','invalid password');
            }

        }else{
            return back()->with('message','invalid email');
        }

    }





}
