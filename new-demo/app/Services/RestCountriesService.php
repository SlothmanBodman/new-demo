<?php

namespace App\Services;

class RestCountriesService extends AbstractApiService
{
    protected function setBaseUrl()
    {
        $this->baseUrl = config('api.restcountries');
    }

    public function getCountries()
    {
        return $this->get('region/europe');
    }
}
