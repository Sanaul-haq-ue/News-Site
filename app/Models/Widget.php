<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Widget extends Model
{
    use HasFactory;

//    protected $fillable = ['image', 'link', 'advertisementStatus'];

    public static $advertisement, $homeSetting, $image, $imgUrl, $imageNewName, $directory;


    public static function saveAbertisement($request){
        self::$advertisement = Widget::find(1);
        if ($request->file('image')){
            if (self::$advertisement->image){
                if (file_exists(self::$advertisement->image)){
                    unlink(self::$advertisement->image);
                }
            }
            self::$advertisement->image = self::saveImage($request);
        }
        self::$advertisement->link = $request->link;
        self::$advertisement->save();
    }

//    public static function saveAbertisement($request){
//        self::$advertisement = Widget::create([
//            'image' => self::saveImage($request),
//            'link' => $request->link,
//            'advertisementStatus' => $request->advertisementStatus,
//        ]);
//    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = 'advertisementImage'.rand().'.'.self::$image->extension();
        self::$directory = 'admin-assets/img/advertisement/';
        self::$imgUrl = self::$directory  .self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }



//    public static function saveImage($request){
//        self::$image = $request->file('image');
//        self::$imageNewName = 'advertisementImage' . rand() . '.' . self::$image->extension();
//        self::$directory = 'admin-assets/img/advertisement/';
//        self::$imgUrl = self::$directory . self::$imageNewName;
//
//        // Move the image to the specified directory
//        self::$image->move(public_path(self::$directory), self::$imageNewName);
//
//        return self::$imgUrl;
//    }

    public static function saveFirst($request){
        self::$homeSetting = Widget::find(1);
        self::$homeSetting->firstCategory = $request->firstCategory;
        self::$homeSetting->save();
    }

    public static function saveSecond($request){
        self::$homeSetting = Widget::find(1);
        self::$homeSetting->secondCategory = $request->secondCategory;
        self::$homeSetting->save();
    }

    public static function saveThird($request){
        self::$homeSetting = Widget::find(1);
        self::$homeSetting->thirdCategory = $request->thirdCategory;
        self::$homeSetting->save();
    }

    public static function saveFour($request){
        self::$homeSetting = Widget::find(1);
        self::$homeSetting->fourCategory = $request->fourCategory;
        self::$homeSetting->save();
    }



    public function category(){
        return $this->belongsTo(Category::class);
    }
}
