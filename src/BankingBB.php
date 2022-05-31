<?php

namespace Divulgueregional\ApiInterV2;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;

class InterBanking
{
    protected $token;
    protected $optionsRequest = [];

    private $client;
    function __construct(array $config)
    {
        // $this->client = new Client([
        //     'base_uri' => 'https://cdpj.partners.bancointer.com.br',
        // ]);

        // $this->optionsRequest = [
        //     'headers' => [
        //         'Accept' => 'application/json'
        //     ],
        //     'cert' => $config['certificate'],
        //     'verify' => $config['certificate'],
        //     'ssl_key' => $config['certificateKey'],
        // ];
    }
}