<?php

namespace PrefCamapua\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;

class EmailServices
{
    /**
     * @param Request $request
     * @param $email
     * @return $this
     */
    public function sendEmailContact(Request $request, $email)
    {
        $v = Validator::make($request->all(),
            [
                'nome' => 'required',
                'email' => 'required|email',
                'mensagem' => 'required',
            ]
        );

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }


        Mail::send('emails.contato', ['contato' => $request], function ($m) use ($request,$email) {
            $m->from('sendmail@i9cg.com.br', 'Fale Conosco');
            $m->to($email, 'Fale Conosco')->subject('Fale Conosco');
        });
    }


    /**
     * @param $email
     * @param $token
     */
    public function sendMailForgetPassword($email,$token)
    {
        Mail::send('auth.passwords.sent', ['token' => $token], function ($m) use ($email) {
            $m->from('sendmail@i9cg.com.br', 'Recuperar Senha');
            $m->to($email)->subject('Recuperar Senha');
        });
    }

}