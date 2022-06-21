<?php

declare(strict_types=1);

namespace App\Services;

use Appp\Traits\ConsumesExternalServices;

class PayPalServie
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $cliendId;

    protected $clientSecret;

    public function __construct()
    {
        $this->baseUri = config('services.payapal.base_uri');
        $this->cliendId = config('services.payapal.client_id');
        $this->clientSecret = config('services.payapal.client_secret');
    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {

    }

    public function decodeResponse($response)
    {

    }

}