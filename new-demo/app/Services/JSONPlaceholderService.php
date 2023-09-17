<?php

namespace App\Services;

use App\Services\AbstractApiService;

class JSONPlaceholderService extends AbstractApiService
{
    /**
     * Set the base URL from ENV Variable 
     */
    protected function setBaseUrl()
    {
        $this->baseUrl = config('api.jsonplaceholder');
    }

    /**
     * Query the Posts Endpoint
     * @return array<mixed>
     */
    public function getPosts()
    {
        return $this->get('posts');
    }

    /**
     * Query the Todos Endpoint
     * @return array<mixed>
     */
    public function getTodos()
    {
        return $this->get('todos');
    }
}
