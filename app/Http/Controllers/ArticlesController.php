<?php

namespace App\Http\Controllers;



use App\Article;
use App\Http\Requests;
use Request;
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

    public function store(){
      Article::create(Request::all());
      //same as
      /*
      $article = new Article;
      $article->title = $input['title'];
      */
      return redirect('articles');
    }
}
