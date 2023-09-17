<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckApiEndpoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:check-endpoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check that our third party api endpoints are live';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $endpoints = [
            config('api.jsonplaceholder') . 'todos',
            config('api.restcountries') . 'all'
        ];

        foreach ($endpoints as $endpoint) {
            $this->info($endpoint);
            $response = Http::get($endpoint);

            if ($response->successful()) {
                $this->info("Endpoint {$endpoint} is live.");
            } else {
                $this->error("Endpoint {$endpoint} is down.");
            }
        }
    }
}
