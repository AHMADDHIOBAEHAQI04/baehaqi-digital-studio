<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $portfolio = json_decode(
            file_get_contents(resource_path('data/portfolio.json')),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        return view('portfolio.index', compact('portfolio'));
    }
}
