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
        $mensagem = [
            'pagamento' => $request->pagamento,
            'mensagem' => $request->mensagem,
        ];
        Event::dispatch(new PagamentoConfirmado($idUser, $mensagem));
    }
}
