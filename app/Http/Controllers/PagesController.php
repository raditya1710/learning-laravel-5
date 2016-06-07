<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{

    public function about(){
      $people = [
        'Pipin', 'Dian'
      ];
      return view('pages.about', compact('people'));
      /*return view('pages.about')->with('name', $name);*/
    }

    public function contact(){
      return view('pages.contact');
    }
}


?>
