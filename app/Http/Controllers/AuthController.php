<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        echo 'logout';
    }

    public function loginSubmit(Request $request)
    {

        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required|min:6',
        ],
        [   
            'text_username.required' => 'O username é obrigatório',
            'text_username.email' => 'O username deve ser um email válido',
            'text_password.required' => 'A senha é obrigatória',
            'text_password.min' => 'A senha deve ter pelo menos :min caracteres',
        ]
    
    );

        $username = $request->input('text_username');
        $password = $request->input('text_password');

        echo 'ok';
    }
}
