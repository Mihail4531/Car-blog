<?php

namespace App\Http\Controllers\Servise;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiseController extends Controller
{
    public function index()
    {
        return view('servise::index', ['title' => 'Услуги']);
    }

    public function show($id)
    {
        $post = Service::findOrFail($id);
        return view('servise::show',[
            'title' => $post->title,
            'post' => $post,
        ]);
    }
}
