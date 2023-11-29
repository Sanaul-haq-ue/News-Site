<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactBody extends Model
{
    use HasFactory;

    public static $contactBody;

    public static function updateContactBody($request){
        self::$contactBody = ContactBody::find($request->id);
        self::$contactBody->contact_heading = $request->contact_heading;
        self::$contactBody->contact_info = $request->contact_info;
        self::$contactBody->contact_info_description = $request->contact_info_description;
        self::$contactBody->office_address = $request->office_address;
        self::$contactBody->email_address = $request->email_address;
        self::$contactBody->phone = $request->phone;
        self::$contactBody->contact_form_info = $request->contact_form_info;
        self::$contactBody->save();
    }
}
