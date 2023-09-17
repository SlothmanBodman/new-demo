<?php

namespace App\Services;

use App\Responses\CountryResponseItem;

class RestCountriesService extends AbstractApiService
{
    protected function setBaseUrl()
    {
        $this->baseUrl = config('api.restcountries');
    }

    public function getCountries()
    {
        $data = $this->get('region/europe');

        return array_map(function ($country) {
            return new CountryResponseItem($country);
        }, $data);
    }
}
