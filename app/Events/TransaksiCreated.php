<?php

namespace App\Events;

use App\Models\Transaksi;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransaksiCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $transaksi;

    public function __construct(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
    }
}
