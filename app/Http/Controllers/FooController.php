<?php

namespace App\Http\Controllers;

use App\Repositories\FooRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class FooController extends Controller
{
    /*
    private $repository;

    public function __construct(FooRepository $repository){
        $this->repository = $repository;
    }
    */

    /* Method Injection */

    /* This method only injected once, so use this. Otherwise, use above */
    public function foo(FooRepository $repository){

      return $repository->get();
    }
}
