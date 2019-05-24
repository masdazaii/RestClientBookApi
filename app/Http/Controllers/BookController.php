<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Book;
use App\Catregory;
use App\User;

class BookController extends Controller
{
    function index()
    {
        
        //where table yg sesuai token
        return Response()->json(['result'=> 'success','Book'=> Book::with('category')->get()]);
        //return Response()->json(['result'=> 'success','Book'=> Catregory::with('book')->get()]);
        // return response()->json([User::where('remember_token',$token)->get()->all()]);
        //return response()->json(User::all());

    }

    




}
