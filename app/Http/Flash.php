<?php

namespace App\Http;

class Flash {

    public function message($title, $message)
    {
        session()->flash('flash_message', [
            'title'     =>  $title,
            'message'   =>  $message
        ]);
    }
}

// $flash->message('Hello There');
// $flash->error('');
// $flash->aside('');
// $flash->overlay('');
// $flash->success('');