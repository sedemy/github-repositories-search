<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\GenerateLinkService;

class SearchFormController extends Controller
{


    public function form(){
        return view('search_form');
    }



    public function show_result(){

        $repositories =  (new GenerateLinkService(request('language'),request('created'),request('sort'),request('order'),request('per_page')))->get_repositories();


        return view('repositories',compact('repositories'));


    }
}
