<?php

namespace App\Http\Controllers;



use App\Article;
use App\Http\Requests;
use Carbon\Carbon;

class ArticlesController extends Controller
{
    public function index(){
      /* $articles = Article::all(); */ //make articles down to the bottom, expected top

      $articles = Article::latest('published_at')->unpublished()->get(); //done with scope, reference to Article.php
      // same as:
      /* $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get(); */
      // ^ without scope

      // make the future published not seen
      return view('articles.index', compact('articles'));
    }

    public function show($id){
      $article = Article::findOrFail($id);
      //same as:
      /*$article = Article::find($id);
      if(is_null($article)){
        abort(404);
      }*/

      dd($article->published_at); //show the Carbon instance

      return view('articles.show', compact('article'));
    }

    public function create(){
      return view('articles.create');
    }

    /**
     * Save a new article.
     *
     * @param CreateArticleRequest $Request
     * @return Response
     */
    public function store(Requests\CreateArticleRequest $request){
      Article::create($request->all());
      return redirect('articles');
    }
}
