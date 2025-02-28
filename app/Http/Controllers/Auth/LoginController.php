<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function username()
{
    // Cek apakah input adalah email atau username
    $field = filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
    // Merubah input sesuai dengan field yang ditentukan
    request()->merge([$field => request()->input('username')]);
                                                                                                                                                            
    // Tidak perlu mengembalikan apa pun di sini
    // Laravel secara otomatis akan menangani field yang dipilih
}

     

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
