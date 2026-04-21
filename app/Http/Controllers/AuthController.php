<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //LOGIN
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    //REGISTRO
    public function showRegister() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso.');
    }

    //CAMBIAR CONTRASEÑA
    public function showResetPassword() {
        return view('reset-password');
    }

   public function updatePassword(Request $request) {
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|confirmed', 
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'El correo no existe en nuestra base de datos.']);
    }

    $user->password = $request->password; 
    
    if ($user->save()) {
        return redirect()->route('login')->with('success', 'Contraseña actualizada correctamente.');
    }

    return back()->withErrors(['email' => 'No se pudo guardar la nueva contraseña.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
