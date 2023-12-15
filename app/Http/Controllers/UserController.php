<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function auth()
    {
        return view('pages.auth');
    }
    public function ActionAuth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect()->intended('/'); // Перенаправление на страницу после успешной аутентификации
        } else {
            // Аутентификация не удалась
            return back()->withInput()->withErrors(['email' => 'Неверный email или пароль']);
            // Возвращаем обратно с ошибкой и сохраняем введенный email для повторного заполнения формы
        }
    }
    public function register(){
        return view('pages.register');
    }
    public function ActionRegister(UserRequest $request){
       $user = User::create([
           'name' => $request->username,
           'email' => $request->email,
           'password' => $request->password,
       ]);
       Auth::authenticate($user);
       return redirect()->back();
    }
}
