<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Faq;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_category = Category::count();
        $total_subcategory = SubCategory::count();
        $total_news = Post::count();
        $total_faq = Faq::count();

        return view('admin.home', compact('total_category','total_subcategory','total_news','total_faq'));
    }
}
