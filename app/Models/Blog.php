<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function League\Flysystem\move;

class Blog extends Model
{
    use HasFactory;

    public static $blog, $image, $imgUrl, $imgNewName, $directory, $str;

    public static function saveBlog($request){
        self::$blog = new Blog();
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeslug($request);
        self::$blog->category_id = $request->category_id;
        self::$blog->date = $request->date;
        self::$blog->addSlider = $request->addSlider;
        self::$blog->image = self::saveImage($request);
        self::$blog->blog_type = $request->blog_type;
        self::$blog->description = $request->description;
        self::$blog->save();

    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imgNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'front-assets/img/blog/';
        self::$imgUrl = self::$directory.self::$imgNewName;
        self::$image->move(self::$directory,self::$imgNewName);
        return self::$imgUrl;

    }

    public static function makeslug($request){
        if ($request->slug){
            self::$str = $request->slug;
            return preg_replace('/\s+/u','-',trim(self::$str));
        }
        else{
            self::$str = $request->title;
            return preg_replace('/\s+/u','-',trim(self::$str));
        }

    }

    public static function saveUpdate($request, $id){
        self::$blog = Blog::find($id);
        self::$blog->title = $request->title;
        self::$blog->slug = self::makeslug($request);
        self::$blog->category_id = $request->category_id;
        self::$blog->date = $request->date;
        self::$blog->addSlider = $request->addSlider;
        if ($request->file('image')){
            if (self::$blog->image){
                if (file_exists(self::$blog->image)){
                    unlink(self::$blog->image);
                }
            }
            self::$blog->image = self::saveImage($request);
        }
        self::$blog->blog_type = $request->blog_type;
        self::$blog->description = $request->description;
        self::$blog->save();

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getReadingTime(){
        $min = round(str_word_count($this->description) / 250);
        return ($min < 1) ? 1 : $min;
    }



}
