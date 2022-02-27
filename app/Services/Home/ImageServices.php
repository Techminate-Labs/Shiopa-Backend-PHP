<?php

namespace App\Services\Home;

use Illuminate\Support\Str;

//Services
use App\Services\BaseServices;
use App\Services\Validation\Item\CategoryValidation;

//Models
use App\Models\Category;

//Utilities
use App\Utilities\FileUtilities;

class ImageServices extends BaseServices{
    public static $imagePath = 'images/category';
    public static $explode_at = "category/";

    private  $categoryModel = Category::class;

}
