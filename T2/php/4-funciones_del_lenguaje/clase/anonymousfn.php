<?php
function onMessage($message, $handler = null) {
    if (!$handler) {
        return;
    }

    echo "handling message...";
    $handler($message);
}


?>