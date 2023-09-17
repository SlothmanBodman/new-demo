<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JSONPlaceholderService;
use App\Services\RestCountriesService;
use Illuminate\Support\Facades\Log;


class DashboardController extends Controller
{

    public function index(
        JSONPlaceholderService $jsonPlaceholderService,
        RestCountriesService $restCountriesService
    ) {
        $todos = $jsonPlaceholderService->getTodos();
        $countries = $restCountriesService->getCountries();
        Log::info($countries);

        return view('dashboard')->with('todos', $todos, true)->with('countries', $countries);
    }
}
