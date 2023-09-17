<?php

namespace App\Services;

use App\Services\AbstractApiService;

class JSONPlaceholderService extends AbstractApiService
{
    protected function setBaseUrl()
    {
        $this->baseUrl = config('api.jsonplaceholder');
    }

    public function getPosts()
    {
        return $this->get('posts');
    }

    public function getTodos()
    {
        return $this->get('todos');
    }
}
