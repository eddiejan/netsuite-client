<?php

namespace Eddiejan\NetsuiteClient\MessageHandler;

use Eddiejan\NetsuiteClient\Message\Request;

class RequestHandler implements MessageHandlerInterface
{
    public function __invoke(Request $message)
    {
        dump($message);
    }
}