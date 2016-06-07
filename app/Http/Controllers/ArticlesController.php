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
      $articles = Article::latest('published_at')->get();
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

    public function create(){
      return view('articles.create');
    }

    public function store(){
      $input = Request::all();

      $input['published_at'] = Carbon::now();
      Article::create($input);
      //same as
      /*
      $article = new Article;
      $article->title = $input['title'];
      */
      return redirect('articles');
    }
}
