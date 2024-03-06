<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        // return view('articles.index');
        $articles = [
            ['id' => 1, 'name' => 'Article 1'],
            ['id' => 2, 'name' => 'Article 2'],
        ];
        return view('articles.index', compact('articles'));
    }
}
