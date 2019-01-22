<?php
namespace App\Http\Controllers;

use App\Post;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
   /* public function search(Request $request){
        $keywords=$request->keywords;
        $posts = DB::table('Posts')
        ->Where('title', 'like', '%' .$keywords. '%')
        ->get(); 
        return response()->json($posts);
    }*/
    public function search(Request $request){
        $keywords=$request->keywords;
        $results= Post::where('title', 'LIKE', '%' . $keywords . '%')->paginate(6);
        $results->appends(['search' => $keywords]);
     }
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function create()
    {
        return view('post');
    }
    public function store(Request $request)
    {
        $post =  new Post;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->save();
        return redirect('posts');
    }
    public function index()
    {
        $posts = Post::all();
        return redirect('posts');
    }
    public function indexShow(){
        $posts = Post::all();
        return view('index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }
}