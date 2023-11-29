<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class H_F_Wiget extends Model
{
    use HasFactory;
    public static $header_content, $footer_content, $image, $imgUrl, $imgNewName, $directory;


    public static function saveHeaderContent($request){
        self::$header_content = H_F_Wiget::find(1);

        self::$header_content->facebookUrl = $request->facebookUrl;
        self::$header_content->twitterUrl = $request->twitterUrl;
        self::$header_content->linkedinUrl = $request->linkedinUrl;
        self::$header_content->instagramUrl = $request->instagramUrl;
        self::$header_content->youtubeUrl = $request->youtubeUrl;

        if ($request->file('logoImage')){
            if (self::$header_content->logoImage){
                if (file_exists(self::$header_content->logoImage)){
                    unlink(self::$header_content->logoImage);
                }
            }
            self::$header_content->logoImage = self::saveImage($request);
        }
        self::$header_content->logoStatus = $request->logoStatus;

        self::$header_content->logoFirstHeading = $request->logoFirstHeading;
        self::$header_content->logoLastHeading = $request->logoLastHeading;

        self::$header_content->save();
    }


    public static function saveImage($request){
        self::$image = $request->file('logoImage');
        self::$imgNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'front-assets/img/logo/';
        self::$imgUrl = self::$directory.self::$imgNewName;
        self::$image->move(self::$directory,self::$imgNewName);
        return self::$imgUrl;

    }

    public static function saveAdvertisementTwo($request){
        self::$header_content = H_F_Wiget::find(1);
        if ($request->file('advertisementwoImage')){
            if (self::$header_content->advertisementwoImage){
                if (file_exists(self::$header_content->advertisementwoImage)){
                    unlink(self::$header_content->advertisementwoImage);
                }
            }
            self::$header_content->advertisementwoImage = self::saveAdvertisemenTwoImage($request);
        }
        self::$header_content->advertisementwoLink = $request->advertisementwoLink;
        self::$header_content->save();
    }

    public static function saveAdvertisemenTwoImage($request){
        self::$image = $request->file('advertisementwoImage');
        self::$imgNewName = rand().'.'.self::$image->getClientOriginalExtension();
        self::$directory = 'front-assets/img/logo/';
        self::$imgUrl = self::$directory.self::$imgNewName;
        self::$image->move(self::$directory,self::$imgNewName);
        return self::$imgUrl;

    }

}

