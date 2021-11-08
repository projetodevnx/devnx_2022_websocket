<?php

namespace App\Events\GoIngresso;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PagamentoConfirmado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $idUser;
    public $mensagem;
    /**
     * @var string
     */
    private $canal;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $idUser, $mensagem, string $canal)
    {
        $this->mensagem = $mensagem;
        $this->idUser = $idUser;
        $this->canal = $canal;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->idUser);
    }

    public function broadcastAs()
    {
        return $this->canal;
    }

    public function broadcastWith()
    {
            return $this->mensagem;
    }

}
