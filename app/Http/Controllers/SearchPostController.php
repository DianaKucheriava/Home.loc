<?php
namespace App\Http\Controllers;

use App\Post;
use DB;
use Filter;
use Illuminate\Http\Request;
use Illuminate\Pagination;

class SearchPostController extends Controller
{
    public function index(){
    	return view('search');
    }
    public function searchPost(){
    	$keyword = request('keyword');
    	$posts = Post::where('title', 'LIKE', '%' . $keyword . '%')->paginate(3);
        if(request()) {
            $posts->appends(request()->all());
        }
    	return response()->json($posts);
    }
}
