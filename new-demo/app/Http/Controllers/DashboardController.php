<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\JSONPlaceholderService;
use App\Services\RestCountriesService;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;


class DashboardController extends Controller
{

    /**
     * Return the API Data for the Dashboard Page
     * @return View 
     */
    public function index(
        JSONPlaceholderService $jsonPlaceholderService,
        RestCountriesService $restCountriesService
    ): View {
        $todos = $jsonPlaceholderService->getTodos();
        $countries = $restCountriesService->getCountries();
        Log::info($countries);

        return view('dashboard')->with('todos', $todos, true)->with('countries', $countries);
    }
}
