<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register(RegisterRequest $registerRequest)
    {
        $data = [
            'name' => $registerRequest->name,
            'email' => $registerRequest->email,
            'password' => $registerRequest->password,
            'isAdmin' => 0,
            
        ];


        try {
            Auth::login(User::create($data));
            if (Auth::user()->isAdmin) {
                return redirect()->route('dashboardAdmin');
            }
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            return back()->with('Une erreur est survenue lors du traitement, veuillez réessayer');
        }
    }
    public function login(LoginRequest $loginRequest)
    {
        $data = [
            'email' => $loginRequest->email,
            'password' => $loginRequest->password,
        ];


        try {
            if (Auth::attempt($data)) {
                return Auth::user()->userRoles;
                if (Auth::user()->isAdmin) {
                    return redirect()->route('dashboardAdmin');
                }
                return redirect()->route('dashboard');
            } else {
                return back()->withErrors('email ou mot de passe invalide')->withInput();
            }
        } catch (\Throwable $th) {
            return back()->with('Une erreur est survenue lors du traitement, veuillez réessayer');
        }
    }
}
