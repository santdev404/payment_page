<?php

declare(strict_types=1);

namespace App\Resolver;

use App\Models\PaymentPlatform;
use Exception;

class PaymentPlatformResolver
{
    protected $paymentPlatforms;

    public function __construct()
    {
        $this->paymentPlatforms = PaymentPlatform::all();
    }

    public function resolverService($paymentPlatformId)
    {
        $name = strtolower($this->paymentPlatforms->firstWhere('id', $paymentPlatformId)->name);

        $service = config("services.{$name}.class");

        if($service){
            return resolve($service);
        }

        throw new Exception('The selected payment platform is not it the configuration');
    }
}