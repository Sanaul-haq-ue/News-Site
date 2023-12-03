<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Visitor extends Model
{
    use HasFactory;

    private static $visitor;

    public static function saveVisitor($request)
    {
        self::$visitor = new Visitor();
        self::$visitor->first_name = $request->first_name;
        self::$visitor->last_name = $request->last_name;
        self::$visitor->email = $request->email;
        self::$visitor->password = bcrypt($request->password);
        self::$visitor->save();

        Session::put('visitorId', self::$visitor->id);
        Session::put('visitorName', self::$visitor->first_name);

    }

    // In Visitor.php model
    protected $fillable = ['old_password', /* other fields */];

}
