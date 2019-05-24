<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;

class IndexController extends Controller
{
    public function index(){
	   	$response = $client->request('GET', 'http://localhost:8000/api/buku', [
	 	   'headers' => [
	       'Accept' => 'application/json',
	       'Authorization' => 'Bearer '.$accessToken,
	    ],
	]);

	   return view('layout/home');
    }
}
