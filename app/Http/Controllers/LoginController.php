<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Index login controller
     *
     * When user success login will retrive callback as api_token
     */
    public function index(Request $request)
    {
        $hasher = app()->make('hash');

        $username = $request->input('username');
        // $email = $request->input('email');
        $password = $request->input('password');

        $login = User::where('username', $username)->first();
        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'Cek Lagi! username salah kali atau passwordnya!';

            return response($res);
        }else{
            if ($hasher->check($password, $login->password)) {
                $api_key = sha1(time());
                $create_token = User::where('id', $login->id)->update(['api_key' => $api_key]);
                if ($create_token) {
                    $res['success'] = true;
                    $res['api_key'] = $api_key;
                    $res['message'] = $login;

                    return response($res);
                }
            }else{
                $res['success'] = true;
                $res['message'] = 'Cek Lagi! username salah kali atau passwordnya!';

                return response($res);
            }
        }
    }
}
