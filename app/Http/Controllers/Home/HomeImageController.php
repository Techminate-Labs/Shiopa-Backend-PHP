<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service
use App\Services\Home\ImageServices;

class HomeImageController extends Controller
{
    private $imageServices;

    public function __construct(ImageServices $imageServices){
        $this->imageServices = $imageServices;
    }

    public function sliderImages(){
        return $this->imageServices->sliderImages();
    }

    public function bannerTopImages(){
        return $this->imageServices->bannerTopImages();
    }

    public function bannerMiddleImages(){
        return $this->imageServices->bannerMiddleImages();
    }

    public function bannerBottomImages(){
        return $this->imageServices->bannerBottomImages();
    }

    public function brandLogoImages(){
        return $this->imageServices->brandLogoImages();
    }
}
