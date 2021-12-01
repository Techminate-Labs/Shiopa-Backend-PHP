<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Service
use App\Services\Item\BlogServices;

class BlogController extends Controller
{
    private $blogServices;

    public function __construct(BlogServices $blogServices){
        $this->services = $blogServices;
    }

    public function brandList(Request $request)
    {
        return $this->services->brandList($request);
    }

    public function brandGetById($id)
    {
        return $this->services->brandGetById($id);
    }

    public function brandCreate(Request $request)
    {
        return $this->services->brandCreate($request);
    }

    public function brandUpdate(Request $request, $id)
    {
        return $this->services->brandUpdate($request, $id);
    }

    public function brandDelete($id)
    {
        return $this->services->brandDelete($id);
    }
}
