<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Post;
use App\Helper\Helpers;

class SubCategoryController extends Controller
{
    public function index($id)
    {
        Helpers::read_json();

        $sub_category_data = SubCategory::where('id',$id)->first();
        $post_data = Post::where('sub_category_id',$id)->orderBy('id','desc')->paginate(6);
        return view('front.sub_category', compact('sub_category_data','post_data'));
    }

    public function sejarahmasjid()
    {
        Helpers::read_json();
        return view('front.sejarahmasjid');
    }

    public function pengurusmasjid()
    {
        Helpers::read_json();
        return view('front.pengurusmasjid');
    }

    public function jadwalshalat()
    {
        Helpers::read_json();
        return view('front.jadwalshalat');
    }
    public function jadwalkhutbah()
    {
        Helpers::read_json();
        return view('front.jadwalkhutbah');
    }
    public function kasmasjid()
    {
        Helpers::read_json();
        return view('front.kasmasjid');
    }
}
