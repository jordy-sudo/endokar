<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        // Incrementar el contador de intentos de inicio de sesión fallidos
        $this->incrementLoginAttempts($request);

        // Obtener el usuario
        $user = $this->guard()->user();

        // Verificar si el usuario existe y si ya está bloqueado
        if ($user && $user->login_attempts >= 3 && !$user->locked_at) {
            // Actualizar el campo 'locked_at' para bloquear al usuario
            $user->update(['locked_at' => now()]);
            // Limpiar los intentos de inicio de sesión fallidos
            $this->clearLoginAttempts($request);
            // Redirigir al usuario a la página de bloqueo o mostrar un mensaje de error
            return redirect()->route('locked');
        }

        return redirect()
            ->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => __('auth.failed'),
            ]);
    }

    protected function authenticated(Request $request, $user)
    {
        // Si el usuario está autenticado correctamente, restablecer el contador de intentos y el campo 'locked_at'
        $user->update(['login_attempts' => 0, 'locked_at' => null]);
    }
   
}
