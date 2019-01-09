<?php
namespace App\Http\Controllers\Ajax;
namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 use Session;
 use Request;

class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        $country = DB::table("country")->pluck("country","id_country");
        return view('auth.register', compact('country'));
    }
    public function regionAjax($id_country)
    {
        $region = DB::table("region")->where("id_country",$id_country)->pluck("region","id_region");
        return json_encode($region);
    }
    public function cityAjax($id_region)
    {
        $city = DB::table("city")->where("id_region",$id_region)->pluck("city","id_city");
        return json_encode($city);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'id_country' => 'required|integer',
            'id_region' => 'required|integer',
            'id_city' => 'required|integer'
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_country' => $data['id_country'],
            'id_region' => $data['id_region'],
            'id_city' => $data['id_city'],
            'avatar'=> 'default.jpg'
        ]);
    }
}
