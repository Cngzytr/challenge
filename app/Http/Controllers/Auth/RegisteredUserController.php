<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function changeTheme(Request $request)
    {
        User::where('id', $request->id)->update(['theme' => $request->color]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'site_url' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->all()
            ], 422);
        }else
        {
            $user = User::create([
                'company_name' => $request->company_name,
                'site_url' => $request->site_url,
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $answer = event(new Registered($user));

            
            Auth::login($user);

            return response()->json([
                'status' => true,
                'msg' => 'Başarılı',
                'company_name' => $request->company_name,
                'token' => $request->_token,
            ], 200);
        }
    }
}
