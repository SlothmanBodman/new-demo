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

    /**
     * Make Http Request to provided baseURL + endpoint
     * @param string $endpoint
     * @return array<mixed> 
     */
    protected function get(string $endpoint): array
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
