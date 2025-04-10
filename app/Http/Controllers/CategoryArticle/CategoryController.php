<?php

namespace App\Http\Controllers\CategoryArticle;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = CategoryArticle::where('is_active', true)->get();
        return view('website.categories.index', [
            'title' => 'Категории',
            'categories' => $categories,
        ]);
    }

}
