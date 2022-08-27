<?php

namespace PrefCamapua\Http\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class EmailServices
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmailContact(Request $request)
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


        Mail::send('emails.contato', ['contato' => $request], function ($m) use ($request) {
            $m->from('naoresponda@institutocientifico.com.br', 'Fale Conosco');
            $m->to('contato@institutocientifico.com.br', 'Fale Conosco')->subject('Fale Conosco');
        });
    }

    /**
     * @param int $numeroPedido
     */
    public function sendMailPedido($numeroPedido)
    {
        $user = auth()->user();
        Mail::send('emails.pedido', ['user' => $user, 'orderCod' => $numeroPedido], function ($m) use ($user) {
            $m->from('naoresponda@institutocientifico.com.br', 'Pedido Realizado com sucesso');
            $m->to($user->email, $user->name)->subject('Pedido Realizado com sucesso');
        });

       /* Mail::send('emails.pedido-admin', ['orderCod' => $numeroPedido], function ($m) {
            $m->from('naoresponda@institutocientifico.com.br')->subject('Novo Compra - ICAT');
            $m->to('contato@institutocientifico.com.br')->subject('Novo Pedido');
        });*/
    }

    /**
     * @param $numeroPedido
     * @param $status
     * @param $emailCliente
     */
    public function sendMailStatusPedido($numeroPedido, $status, $emailCliente)
    {
        Mail::send('emails.changeStatus', ['status' => $status, 'orderCod' => $numeroPedido], function ($m) use ($emailCliente) {
            $m->from('naoresponda@institutocientifico.com.br', 'Situação de Seu Pedido');
            $m->to($emailCliente)->subject('Situação de Seu Pedido');
        });
    }

    /**
     * @param string $emailCliente
     */
    public function sendMailBoasVindas($emailCliente)
    {
        Mail::send('emails.boas_vindas', [], function ($m) use ($emailCliente) {
            $m->from('naoresponda@institutocientifico.com.br', 'Bem Vindo ao ICAT');
            $m->to($emailCliente)->subject('Cadastro Realizado');
        });
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function sendEmailTrabalheConosco(Request $request){

       if($request->tipo == 'professor'){
           Mail::send('emails.trabalheConoscoProfessor', ['contato' => $request], function ($m) {
               $m->from('naoresponda@institutocientifico.com.br', 'Trabalhe Conosco');
               $m->to('contato@institutocientifico.com.br')->subject('Trabalhe Conosco - Professor');
           });
       }

        if($request->tipo == 'empresa'){
           Mail::send('emails.trabalheConoscoEmpresa', ['contato' => $request], function ($m) {
               $m->from('naoresponda@institutocientifico.com.br', 'Trabalhe Conosco');
               $m->to('contato@institutocientifico.com.br')->subject('Trabalhe Conosco - Empresa');
           });
       }
    }

    /**
     * @param $email
     * @param $token
     */
    public function sendMailForgetPassword($email,$token)
    {
        Mail::send('auth.passwords.sent', ['token' => $token], function ($m) use ($email) {
            $m->from('naoresponda@institutocientifico.com.br', 'Recuperar Senha');
            $m->to($email)->subject('Recuperar Senha');
        });
    }

}