<?php

use App\Models\Message;

function tr($message, $param = [])
{
    $exist = Message::where('key', 'LIKE', $message)->first();
    if ($exist) {
        $translation = $exist->translate()->title;
        if ($translation) {
            return $translation;
        }
        return $message;
    }
    return $message;
}
