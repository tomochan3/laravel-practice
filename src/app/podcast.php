<?php

namespace App;

use App\Contracts\Publisher;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    /**
     * ポッドキャストの公開
     *
     * @param  Publisher  $publisher
     * @return void
     */
    // public function publish(Publisher $publisher)
    // {
    //     $this->update(['publishing' => now()]);

    //     $publisher->publish($this);
    // }

    public function publish()
    {
        $this->update(['publishing' => now()]);

        Publisher::publish($this);
    }
}
