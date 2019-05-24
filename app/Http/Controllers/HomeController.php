<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Http\Middleware\CheckClientCredentials;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
        $response = $client->request('GET', 'http://localhost:8000/api/buku', [
               'headers' => [
               'Accept' => 'application/json',
               'Authorization' => 'Bearer '.$accessToken,
            ],
        ]);
    {
        return view('layout/home');
    }
}
