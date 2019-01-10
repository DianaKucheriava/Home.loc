<?php
namespace App\Http\Controllers\Ajax;
namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\Welcom;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
//use Request;
use Illuminate\Auth\Events\Registered;
use App\Jobs\SendVerificationEmail;
class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('guest');
    }
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
            'id_city' => 'required|integer',
        ]);
    }
    protected function create(array $data)
    {
            return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'id_country' => $data['id_country'],
            'id_region' => $data['id_region'],
            'id_city' => $data['id_city'],
            'avatar'=> 'default.jpg',
            'email_token' => base64_encode($data['email']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        dispatch(new SendVerificationEmail($user));
        return view('emails.verification');
    }
    public function verify($token)
    {
        $user = User::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save()){
            return view('emailconfirm',['user'=>$user]);
        }
    }
}
