<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GenerateLinkService
{
    public const GETHUB_BASE_URL = 'https://api.github.com/search/repositories';

    private function generateUrl($request)
    {
        $q = $request->language != '' ? 'language:' . $request->language : '';
        $q .= $request->created != '' ? '+created:>' . $request->created : '';

        $parameters = 'q=' . $q . '&sort=' . ($request->sort ?? '');
        $parameters .= '&order=' . ($request->order ?? '') . '&per_page=' . $request->per_page ?? 100;

        return self::GETHUB_BASE_URL . '?' . $parameters;
    }

    public function getRepositories(Request $request)
    {
        $response = Http::get($this->generateUrl($request));

        return json_decode($response->body())->items;
    }
}
