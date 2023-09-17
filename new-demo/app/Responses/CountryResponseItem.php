<?php

namespace App\Responses;

class CountryResponseItem
{
    public string $commonName;
    public string $officialName;
    public bool $unMember;

    public function __construct(array $data)
    {
        $this->commonName = $data["name"]["common"];
        $this->officialName = $data["name"]["official"];
        $this->unMember = $data["unMember"];
    }
}
