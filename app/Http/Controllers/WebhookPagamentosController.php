<?php

namespace App\Http\Controllers;

use App\Events\GoIngresso\PagamentoConfirmado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class WebhookPagamentosController extends Controller
{
    public function NotificaPagamento()
    {
        $idUser = 1;
        $mensagem = [
            'pago' => true,
            'mensagem' => 'Pagamento Confirmado com sucesso'
        ];
        Event::dispatch(new PagamentoConfirmado($idUser, $mensagem));
    }
}
