<?php

namespace Eddiejan\NetsuiteClient\MessageHandler;

use Eddiejan\NetsuiteClient\Message\NetsuiteRequest;

class NetsuiteRequestHandler implements MessageHandlerInterface
{
    public function __invoke(NetsuiteRequest $message)
    {
        dump($message);
    }
}