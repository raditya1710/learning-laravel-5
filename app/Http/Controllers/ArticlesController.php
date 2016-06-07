<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;

class ArticlesController extends Controller
{
    public function index(){
      $articles = Article::all();
      return view('articles.index', compact('articles'));
    }

    public function show($id){
      $article = Article::findOrFail($id);
      //same as:
      /*$article = Article::find($id);
      if(is_null($article)){
        abort(404);
      }*/
      return view('articles.show', compact('article'));
    }
}
