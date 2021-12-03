<?php

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Eddiejan\NetsuiteClient\NetsuiteEnvironment;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$environment = new NetsuiteEnvironment(
    '4948328_SB1',
    'b73baa7d76fb14a0eb4790d8bcb86eebffb158ec91e1974277f8f5fec2d0bbfd',
    '128a14a12d60e87153d3cdf223abf124e3fe07f960b3173f93695961586998d8',
    'b6df99f538c7fd6812711f1d4473ed8c0129bbec1c79409754e9a699d26cb7f6',
    'db9d112793021e184a61d71e25224d3b90fb80ba397d2e75c83ab55b90be07dc',
    'https://4948328-sb1.suitetalk.api.netsuite.com',
);

$client = new NetsuiteClient(
    HttpClient::create(),
    $environment
);

var_dump($client->request('GET', '/services/rest/record/v1/subsidiary')->getContent(false));