<?php

namespace App\Http\Controllers;


use Auth;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct(){
      $this->middleware('auth', ['only' => 'create']);
    }
    public function index(){

      /* $articles = Article::all(); */ //make articles down to the bottom, expected top

      $articles = Article::latest('published_at')->published()->get(); //done with scope, reference to Article.php
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

      //dd($article->published_at); //show the Carbon instance

      return view('articles.show', compact('article'));
    }

    public function create(){

      if(Auth::guest()){
        return redirect('articles');
      }
      return view('articles.create');
    }

    /**
     * Save a new article.
     *
     * @param CreateArticleRequest $Request
     * @return Response
     */
    public function store(ArticleRequest $request){

      $article = new Article($request->all()); //user_id is made behind the scene
      Auth::user()->articles()->save($article);

      return redirect('articles'); // make to the articles page again
    }

    public function edit($id){
      $article = Article::findOrFail($id);
      return view('articles.edit', compact('article'));
    }

    public function update($id, ArticleRequest $request){
      $article = Article::findOrFail($id);

      $article->update($request->all());

      return redirect('articles');
    }
}
