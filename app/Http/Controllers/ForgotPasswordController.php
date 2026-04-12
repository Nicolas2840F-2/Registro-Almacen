<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail as MailResetPasswordMail;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = Usuario::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Usuario no encontrado']);
        }

        $resetCode = str_pad(rand(100000, 999999), 6, '0', STR_PAD_LEFT);
        $user->reset_code = $resetCode;
        $user->save();

        // Envía el correo electrónico al usuario con el código de restablecimiento
        Mail::to($user->email)->send(new MailResetPasswordMail($resetCode));

        return redirect()->route('password.verify', ['email' => $user->email]);

    }
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'reset_code' => 'required|digits:6', // Validar que el código tenga exactamente 6 dígitos
        ]);

        // Buscar al usuario con el código y obtener su correo
        $user = Usuario::where('email', $request->email)->first();

        if (!$user || $user->reset_code !== $request->reset_code || $user->email !== $request->input('email')) {
            return back()->withErrors(['reset_code' => 'Código de restablecimiento incorrecto']);
        }

        // Si el código es válido y el correo coincide, procede con el restablecimiento de la contraseña
        return redirect()->route('password.reset', ['email' => $user->email]);
    }




}
