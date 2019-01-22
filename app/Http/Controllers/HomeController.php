<?php 
namespace App\Http\Controllers\Ajax;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
	public function index()
	{
		return view('post');
	}
	public function __construct()
	{
		$this->middleware('auth');
	}
}
?>