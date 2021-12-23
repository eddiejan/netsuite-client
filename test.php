<?php

use Eddiejan\NetsuiteClient\NetsuiteClient;
use Eddiejan\NetsuiteClient\NetsuiteCredential;
use Symfony\Component\HttpClient\HttpClient;

require 'vendor/autoload.php';

$environment = new NetsuiteCredential(
    '4948328_SB1',
    '6db8c2091c01b8e2bd2af0ab6fa7be2c239d3405be507b8a962c58f7a86daacd',
    'd85e9935777929ee38e45fc2cac497997ad091427cda3e839e9e22e26b9a104b',
    'ec06cca80867de297c0f182dca183e3bcd653996ab5b43d92eded8f652a6fc1c',
    'd093df3a8de48d47a17b484a81412444642ba0c8c2b86c66a9fdd90d0a50ec1e',
    'https://4948328-sb1.suitetalk.api.netsuite.com',
);

$client = new NetsuiteClient(
    HttpClient::create(),
);

$client->connectEnvironment($environment);

var_dump($client->request('GET', '/services/rest/record/v1/subsidiary')->getContent(false));