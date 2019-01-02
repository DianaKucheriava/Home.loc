<?php 
namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\User;

class SettingsController extends Controller
{
    /**
     * Update the avatar for the user.
     *
     * @param  Request  $request
     * @return Response
     */
         public function update(Request $request)
    {
        $path = $request->file('avatar')->store('storage/app/public/avatars');
        return User::create ([
            'avatar' => $path ]);
    }
        public function index()
    {
        return view('settings');
    }
}

  