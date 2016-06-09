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

    public function show(Article $article){
      //same as:
      /*$article = Article::find($id);
      if(is_null($article)){
        abort(404);
      }*/

      //dd($article->published_at); //show the Carbon instance

      return view('articles.show', compact('article'));
    }

    public function create(){

      $tags = \App\Tag::lists('name', 'id');
      return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article.
     *
     * @param CreateArticleRequest $Request
     * @return Response
     */
    public function store(ArticleRequest $request){

      // to validate the request with certain data:
      /* $this->validate($request, ['title' => 'required']); */
      //$article = new Article($request->all()); //user_id is made behind the scene

      $article = Auth::user()->articles()->create($request->all());

      $tagIds = $request->input('tag_list');
      $article->tags()->attach($tagIds);

      /*
      \Session::flash('flash_message', 'Your article has been created!');
      session()->flash('flash_message_important', true);
      return redirect('articles'); // make to the articles page again
      */
      //same with:
      flash()->overlay('Your article has been successfully created!', 'Good Job!');

      return redirect('articles');
    }

    public function edit(Article $article){
      $tags = \App\Tag::lists('name', 'id');
      return view('articles.edit', compact('article', 'tags'));
    }

    public function update(Article $article, ArticleRequest $request){
      $article->update($request->all());

      return redirect('articles');
    }
}
