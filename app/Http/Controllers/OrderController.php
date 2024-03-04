<?php

namespace App\Http\Controllers;

use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Request;
use App\Services\GetDataJsonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function __construct(public GetDataJsonService $getDataJsonService)
    {
    }

    public function step1()
    {
        return view('step1');
    }

    public function step2(Step1Request $request)
    {
        $data = $request->only('meal', 'qty');
        $dataOrder = Session::get('data');
        if ($dataOrder) {
            $dataOrder['meal'] = $data['meal'];
            $dataOrder['qty'] = $data['qty'];
        } else {
            $dataOrder = $data;
        }
        Session::put('data', $dataOrder);

        $restaurants = $this->getDataJsonService->getRestaurant($data['meal']);

        return view('step2', compact('restaurants'));
    }

    public function step3(Step2Request $request)
    {
        $dataOrder = Session::get('data');
        $dataOrder['restaurant'] = $request->restaurant;
        Session::put('data', $dataOrder);

        $dishes = $this->getDataJsonService->getDishes($request->restaurant);

        return view('step3', compact('dishes', 'dataOrder'));
    }

    public function preview(Request $request)
    {
        $dishes = $request->all();
        $dataOrder = Session::get('data');

        $dishOrders = $this->getDataJsonService->getDishOrders($dishes);
        $dataOrder['dishes'] = $dishOrders;
        Session::put('data', $dataOrder);

        return view('preview', compact('dataOrder'));
    }

    public function submit()
    {
        Session::flush();

        return response()->json(true);
    }
}
