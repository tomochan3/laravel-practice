<?php

// namespace App\Listeners;

// use App\Events\OrderShipped;

// class SendShipmentNotification
// {
//     /**
//      * イベントリスナ生成
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * イベントの処理
//      *
//      * @param  \App\Events\OrderShipped  $event
//      * @return void
//      */
//     public function handle(OrderShipped $event)
//     {
//         // $event->orderにより、注文へアクセス…
//     }
// }

namespace App\Listeners;

use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;

class RewardGiftCard implements ShouldQueue
{
    /**
     * 顧客にギフトカードを贈る
     *
     * @param  \App\Events\OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        //
    }

    /**
     * リスナがキューされるかどうかを決める
     *
     * @param  \App\Events\OrderPlaced  $event
     * @return bool
     */
    public function shouldQueue(OrderPlaced $event)
    {
        return $event->order->subtotal >= 5000;
    }
}
