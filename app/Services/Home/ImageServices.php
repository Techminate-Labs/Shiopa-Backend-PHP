<?php

namespace App\Services\Home;

use Illuminate\Support\Str;

//Services
use App\Services\BaseServices;
use App\Services\Validation\Item\CategoryValidation;

//Models
use App\Models\HomeImage;

//Utilities
use App\Utilities\FileUtilities;

class ImageServices extends BaseServices{
    public static $imagePath = 'images/category';
    public static $explode_at = "category/";

    private  $imageModel = HomeImage::class;

    public function sliderImages(){
        return  HomeImage::where('section','slider')->latest()->limit(5)->get();
    }

    public function bannerTopImages(){
        return  HomeImage::where('section','banner_top')->latest()->limit(3)->get();
    }

    public function bannerMiddleImages(){
        return  HomeImage::where('section','banner_middle')->latest()->limit(1)->get();
    }

    public function bannerBottomImages(){
        return  HomeImage::where('section','banner_bottom')->latest()->limit(1)->get();
    }

    public function brandLogoImages(){
        return  HomeImage::where('section','brand_logo')->latest()->limit(8)->get();
    }

}
