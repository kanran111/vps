<?php

use Ratcher\MessageComponentInterface;
use Ratcher\ConnectionInterface;

class Chat implements MessageComponentInterface{
    protected $clients;
    public function __construct(){
        $this->clients = new \SplObjectStorage;
    }
    public function onOpen(ConnectionInterface $conn){
        $this->clients->attach($conn);
    }
    public function onMessage(ConnectionInterface $conn, $mess){
        foreach($this->clients as $client){
            if($client !== $conn ) $client->send($mess);
        }
    }
    public function onClose(ConnectionInterface $conn){
        $this->clients->detach($conn);
    }
    public function onError(ConnectionInterface $conn, Exception $e){
        echo "error" . $e->getMessage();
        $conn->close();
    }
}