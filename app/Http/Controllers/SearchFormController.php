<?php

namespace App\Http\Controllers;

use App\Services\GenerateLinkService;
use Illuminate\Http\Request;

class SearchFormController extends Controller
{
    public function form()
    {
        return view('search_form');
    }

    public function showResult(Request $request)
    {
        $repositories = (new GenerateLinkService())->getRepositories($request);

        return view('repositories', compact('repositories'));
    }
}
