<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login')->with('logout', 'Você foi desconectado com sucesso!');
    }

    public function loginSubmit(Request $request){

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
        
        $user = User::where('username', $username)
            ->where('deleted_at', null)
            ->first();


        if(!$user){
            return redirect()->back()->withInput()->with('LoginError', 'Username ou senha inválidos');
        };

        if(!password_verify($password, $user->password)){
            return redirect()->back()->withInput()->with('LoginError', 'Username ou senha inválidos');
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' =>[
                'id' => $user->id,
                'username' => $user->username,
            ]
            ]);

        echo 'Logado!';
    }
}
