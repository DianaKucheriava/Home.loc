<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;
use Image;
use Auth;
use App\User;

class UserController extends Controller
{
	public function profile(){
		return view('settings', array('user'=>Auth::user()));
	}
	public function update_avatar(Request $request){
		if ($request->hasFile('avatar')) {
			$avatar=$request->file('avatar');
			$user_name=Auth::user()->name;
			$filename = $user_name. '.' .$avatar->getClientOriginalExtension();
			$avatar=Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
			$user=Auth::user();
			$user->avatar=$filename;
			$user->save();
		}
		return view('settings', array('user'=>Auth::user()));
	}
	public function update_password(Request $request){ 
		$validatedData = $this->validate($request,[
			'oldpass' => 'required|min:6',
			'password' => 'required|string|min:6',
			'password_confirmation' => 'required|same:password',
		],[
			'oldpass.required' => 'Необхілно ввести старий пароль',
			'oldpass.min' => 'Старий пароль повинен складатись починаючи з 6 символів',
			'password.required' => 'Пароль потрібний',
			'password.min' => 'Пароль повинен мітити хоча б 6 символів',
			'password_confirmation.required' => 'Паролі не збігаються'
		]);
		$current_password = \Auth::user()->password;           
		if(\Hash::check($request->input('oldpass'), $current_password)) 
		{
			$user_id = \Auth::user()->id;
			$obj_user = user::find($user_id);						
			$obj_user->password = \Hash::make($request->input('password'));	
			$obj_user->save(); 			
			$data['errorMessage'] = 'Пароль змінено';							
			return redirect()->route('settings', $data);
		} else {
			$data['errorMessage'] = 'Введіть правильный поточний пароль!';
			return redirect()->route('settings', $data);
		}
	}
	public function update_email(Request $request)
	{ 		
		$validatedData = $this->validate($request,[
			'oldemail' => 'required|unique:users,email,'.Auth::user()->id,
			'email' =>'required|string|email|max:255',
			'email_confirmation' => 'required|same:email',
		],[
			'oldemail.required' => 'Дана пошта вже використовується!',
			'email.required' => 'Email is required',
			'email_confirmation.required' => 'Пошта не підтверджена!'
		]);
		$current_email = \Auth::user()->email;           
		if ($request->input('oldemail')==$current_email)
		{
			$id = \Auth::user()->id;
			$userMeta = user::find($id);
			$userMeta->email = $request->input('email');
			$userMeta->save(); 
			$data['error_Message']='Enail змінено!';
			return redirect()->route('settings', $data); 
		} else {
			$data['error_Message'] = 'Будь-ласка введіть правельну поточну пошту!';
			return redirect()->route('settings', $data);
		}
	}
}