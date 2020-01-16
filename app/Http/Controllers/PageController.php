<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Category;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        $articles = Article::all();
        $categories = Category::all();
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}", compact("articles", "categories"));
        }

        return abort(404);
    }

    public function welcome()
    {
        $categories = Category::all();
        return view('pages.welcome', compact('categories'));
    }
}
