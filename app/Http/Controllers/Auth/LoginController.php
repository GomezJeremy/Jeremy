<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Alert;
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
    
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function credentials(Request $request)
    {
        $field = $this->field($request);

        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password'),
            'status' => User::STATUS,
        ];

       
    }

    /**
     * Determine if the request field is email or username.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function field(Request $request)
    {
        $email = $this->username();
        
      

        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $field = $this->field($request);

        $messages = ["{$this->username()}.exists" => 'La cuenta que está intentado ingresar no ha sido activado.'];

        $this->validate($request, [
            $this->username() => "required|exists:users,{$field},status," . User::STATUS,
            'password' => 'required',
        ], $messages);


}
/*protected function sendFailedLoginResponse(Request $request)
   {
        $request->session()->put('login_error', trans('auth.failed'));
       throw ValidationException::withMessages(
           [
                'error' => [trans('auth.failed')],
          ]
        );
    }

   // public function logOut()
   // {
     //   Auth::logout();
      //  alert()->success('You have been logged out.', 'Good bye!');
       // return Redirect::to('login');
  //  }*/
}

