<?php

namespace App\Http\Controllers;

use App\Models\ContactBody;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact_setting(){
        return view('admin.pages.widget.contact.contact-setting',[
            'contact_body' => ContactBody::find(1)->first(),
        ]);
    }

    public function update_contact_body(Request $request){



        $validator = Validator::make($request->all(),[
            'phone' => 'max:16',
        ]);


        if ($validator->passes()){
            ContactBody::updateContactBody($request);
            return back();
        }else{
            return back()->withErrors($validator);
        }
    }


}
