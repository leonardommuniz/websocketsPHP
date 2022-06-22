<?php
namespace App;

require dirname(__DIR__) . '/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
    
    $server = IoServer::factory(
        new HttpServer(
            new WsServer(
                new ChatComponente()
            )
        ),
        8080
    );

    $server->run();