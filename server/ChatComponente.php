<?php
namespace App;

use Ds\Set;
use Exception;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class ChatComponente implements MessageComponentInterface {

    private Set $connectionSet;

    public function __construct(){
        $this->connectionSet =  new Set;
    }
    public function onOpen(ConnectionInterface $conn) {
        echo 'Nova conexão aberta!' . PHP_EOL;
        $this->connectionSet->add($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        foreach ($this->connectionSet as $connection) {
            if ($connection !== $from ) {
                $connection->send((string) $msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->connetctionSet->remove($conn);
    }

    public function onError(ConnectionInterface $conn, Exception $e) {
        echo $e->getMessage();
    }
}