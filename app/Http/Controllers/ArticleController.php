<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Psy\Util\Str;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show', 'fetch', 'result');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $model)
    {
        $categories = Category::all();
        return view('articles.index', ['articles' => $model->latest()->paginate(15), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = $this->_formValidation($request);
        Article::create($article);
        return redirect('article')->withStatus(__('Article successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // dd($article);
        return view('articles.view', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $newArticle = $this->_formValidation($request);
        $article->update($newArticle);
        return redirect('article')->withStatus(__('Article successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('article')->withStatus(__('Article successfully deleted.'));
    }

    public function fetch(Request $request)
    {
        $id = $request->get('id');
        $data = Category::where('id', $id)->first()->articles()->get();
        $output = '<option value="">Pilih Judul</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->title.'</option>';
        }
        echo $output;
    }

    public function result(Request $request)
    {
        // return $request;
        $article = Article::where('id', $request->article)->first();
        // return $article->id;
        return redirect()->route('article.show', [$article]);
    }

    private function _formValidation($request){
        return $request->validate([
            'category_id' => ['required'],
            'title' => ['required'],
            'content' => ['required']
        ]);
    }
}
