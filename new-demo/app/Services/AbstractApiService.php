<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

abstract class AbstractApiService
{
    protected string $baseUrl;

    abstract protected function setBaseUrl();

    public function __construct()
    {
        $this->setBaseUrl();
    }

    protected function get($endpoint)
    {
        try {
            $response = Http::get($this->baseUrl . $endpoint);
            return $response->json();
        } catch (Exception $ex) {
            Log::error('AbstractAPIServiceError', [
                'url' => $this->baseUrl . $endpoint,
                'exception' => $ex
            ]);
            throw $ex;
        }
    }
}
