<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class SearchPostController extends Controller
{
    public function index(){
    	
        return view('search');
    }
}
