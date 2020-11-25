<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /*
    * ログインしたときのredirect先
    */

    public function redirectTo()
    {
        return route('admin.top');
    }

    /**
     *  ログイン画面のviewの指定
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * バリデーション
     */
    protected function validateLogin(Request $request)
    {
        $messages = [
            $this->username().'.required' => 'ログインIDを入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ];

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string', ], $messages);
    }
    /**
     * ログインIDの英語名
     */
    public function username()
    {
        return 'username';
    }
    /**
     * ログアウト処理
     */

     public function logout(Request $request)
     {
         $partialLogin = auth('user')->guest() || auth('admin')->guest();

         $this->guard()->logout();
     /**
      *  片方のみのログインはinvalidate
      */
        if($partialLogin) {
            $request->session()->invalidate();
        }

        return redirect(route('admin.login'));
        
    }

    /**
     * 使用する認証を返す
     */
    protected function guard()
    {
        return auth('admin');
    }

}
