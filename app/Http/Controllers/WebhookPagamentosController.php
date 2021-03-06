<?php

namespace App\Http\Controllers;

use App\Events\GoIngresso\PagamentoConfirmado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class WebhookPagamentosController extends Controller
{

    public function NotificaPagamento(Request $request)
    {
        $idUser = $request->iduser;
        $canal = 'pagamento';
        $mensagem = [
            'pagamento' => $request->pagamento,
            'mensagem' => $request->msg,
        ];
        if ($request->ingressos) {
            $canal = 'ingressos';
        }
        Event::dispatch(new PagamentoConfirmado($idUser, $mensagem, $canal));
        return ['sucess' => true];
    }
}
