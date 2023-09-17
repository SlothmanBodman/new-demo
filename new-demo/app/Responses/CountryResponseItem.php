<?php

namespace App\Responses;

class CountryResponseItem
{
    public string $commonName;
    public string $officialName;
    public bool $unMember;

    /**
     * Map from raw API data to new array.
     */
    public function __construct(array $data)
    {
        $this->commonName = $data["name"]["common"];
        $this->officialName = $data["name"]["official"];
        $this->unMember = $data["unMember"];
    }
}
