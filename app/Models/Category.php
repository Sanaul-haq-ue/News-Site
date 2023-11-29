<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    public static $category,$slug ;

    public static function saveCategory($request){
        self::$category = new Category();

        self::$category->category_name = $request->category_name;
        self::$category->slug = self::makeSlug($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

    public static function updateCategory($request, $id){
        self::$category = Category::find($id);
        self::$category->category_name = $request->category_name;
        self::$category->slug = self::makeSlug($request);
        self::$category->status = $request->status;
        self::$category->save();
    }

//    public static function makeslug($request){
//        if ($request->slug){
//            self::$str = $request->slug;
//            return preg_replace('/\s+/u','-',trim(self::$str));
//        }
//        else{
//            self::$str = $request->title;
//            return preg_replace('/\s+/u','-',trim(self::$str));
//        }
//
//    }

    public static function makeSlug($request){
        if ($request->slug){
            self::$slug = Str::slug($request->slug, '-');
        }else{
            self::$slug = Str::slug($request->category_name, '-');
        }
        return self::$slug;
    }

    public function blog(){
        return $this->hasMany(Blog::class);
    }

}
