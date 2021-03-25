<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use DB;

// Models
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function passwordResets()
    {
        return view('admin.auth.password-resets');
    }

    public function sendPasswordResets(Request $request)
    {
        $user = User::where('email', '=', $request->email)
                    ->first();

        //Check if the user exists
        if (!$user) {
            return redirect()->back()->withError('Usuário não encontrado!');
        }

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => \Str::random(60),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')
                        ->where('email', $request->email)
                        ->latest()
                        ->first();

        try {
            \Mail::send('email.reset_password', ['email' => $tokenData->email, 'token' => $tokenData->token], function ($message) use ($tokenData) {
                $message->to($tokenData->email)
                        ->subject('Trocar senha');
            });
        } catch(\Exception $e) {
            \Log::error('Erro ao tentar redefinir o e-mail do admin: ' . $e->getMessage());

            return redirect()->back()->withInput()->withError('Ocorreu um erro ao tentar enviar o e-mail! Tente novamente');
        }

        return redirect()->back()->withSuccess('Um link de redefinição de senha foi enviado ao seu email!');
    }

    public function resetPassword(Request $request)
    {
        $data = [
            'token' => $request->token,
            'email' => urldecode($request->email)
        ];

        return view('admin.auth.reset-password', $data);
    }

    public function storeResetPassword(Request $request)
    {
        //Validate input
        $validator = \Validator::make($request->all(), [
            'user_email' => 'required|email|exists:users,email',
            'new_password' => 'required',
            'reset_token' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withError('Está faltando informações');
        }

        // Check token
        $tokenData = DB::table('password_resets')
                        ->where('token', $request->reset_token)
                        ->first();

        if (!$tokenData) return redirect()->back()->withError('Token de verificação não encontrado!');

        $datatime1 = new \DateTime(date('Y-m-d H:i:s'));
        $datatime2 = new \DateTime($tokenData->created_at);

        $diff = $datatime1->diff($datatime2);
        $horas = $diff->h + ($diff->days * 24);

        if ($horas >= 1)
            return redirect()->back()->withError('Esse link está expirado!');

        $user = User::where('email', $tokenData->email)->first();
        if (!$user) return redirect()->back()->withError('E-mail não encontrado');

        $user->update(['password' => \Hash::make($request->new_password)]);

        //Delete token
        DB::table('password_resets')->where('email', $user->email)
                                    ->where('token', $request->reset_token)
                                    ->delete();

        return redirect()->route('auth.login')->withSuccess('Senha alterada com sucesso!');
    }
}
