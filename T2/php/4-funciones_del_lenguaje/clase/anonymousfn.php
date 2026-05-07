<?php

function onMessage(string $message, callable $handler = null) {
    if (!$handler) {
        return;
    }

    echo "handling message...";
    $handler($message);
}


?>