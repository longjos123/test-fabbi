<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    public function index()
    {
        $dataJson = File::get(resource_path('data/dishes.json'));
        $data = json_decode($dataJson, true);
        $data = array_values($data)[0];
//        dd($data);

        return view('step', compact('data'));
    }
}
