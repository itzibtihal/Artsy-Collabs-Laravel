<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    // protected $redirectTo = '/admin/route';
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
{
    $inputVal = $request->all();

    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt(['email' => $inputVal['email'], 'password' => $inputVal['password']])) {
        if (Auth::check() && Auth::user()->roles()->where('roles.id', 1)->exists()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('artist.dashboard');
        }
    } else {
        return redirect()->route('login')->with('error', 'Email & Password are incorrect.');
    }
}

}