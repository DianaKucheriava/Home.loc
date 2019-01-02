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
			$filename = time(). '.' .$avatar->getClientOriginalExtension();
			$avatar=Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'.$filename));
			$user=Auth::user();
			$user->avatar=$filename;
			$user->save();
		}
		return view('settings', array('user'=>Auth::user()));
	}
	public function update_password(Request $request)
    { 
    	$validatedData = $this->validate($request,[
            'oldpass' => 'required|min:6',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ],[
            'oldpass.required' => 'Old password is required',
            'oldpass.min' => 'Old password needs to have at least 6 characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password needs to have at least 6 characters',
            'password_confirmation.required' => 'Passwords do not match'
        ]);

        $current_password = \Auth::user()->password;           //взяли старый пароль
        if(\Hash::check($request->input('oldpass'), $current_password))  //сровнили ввод старый и счит старый и если совпали
        {          
          $user_id = \Auth::user()->id;                       			
          $obj_user = user::find($user_id);						
          $obj_user->password = \Hash::make($request->input('password'));	//выбрали поле пароль и считали новый пароль
          $obj_user->save(); 												//сохранили
          return redirect()->route('settings');
        }
        else
        {           
          $data['errorMessage'] = 'Please enter correct current password';
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
          return redirect()->route('settings'); 
        }
        else
        {           
          $data['errorMessage'] = 'Будь-ласка введіть правельну поточну пошту!';
            return redirect()->route('settings', $data);
        }  
    }
}