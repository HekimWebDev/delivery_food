<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function signup(Request $request) {
        $request->validate([
            'name' => 'required|string|alpha',
            'surname' => 'required|string|alpha',
            'number' => 'required|int',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $userData = $request->all();

        $user = new User();
        $user->name = $userData['name'];
        $user->surname = $userData['surname'];
        $user->number = $userData['number'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|string|email||exists:users',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('main-page');
        }

        return back()->withErrors([
            'password' => 'Неверный пароль'
        ]);

    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function password(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Данный email не зарегестрирован.'
            ]);
    }

    public function reset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation',  'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' =>  bcrypt($request->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', trans($status));
        }
    }

    public function notice(Request $request) {

        if ($request->user()->hasVerifiedEmail()){
            return redirect()->intended('/');
        }
        return view('verify-email');
    }

    public function verify(EmailVerificationRequest $request) {

        if ($request->user()->hasVerifiedEmail()){
            return redirect()->intended('/');
        }

        $request->fulfill();

        return redirect()->intended('/');
    }

    public function send(Request $request) {

        if ($request->user()->hasVerifiedEmail()){
            return redirect()->intended('/');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Ссылка отправлена!');
    }
}
