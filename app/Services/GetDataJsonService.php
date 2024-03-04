<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class GetDataJsonService
{
    public function getAllData()
    {
        $dataJson = File::get(resource_path('data/dishes.json'));
        $data = json_decode($dataJson, true);

        return array_values($data)[0];
    }

    public function getRestaurant($meal)
    {
        $data = $this->getAllData();
        $restaurantsWithLunch = [];

        foreach ($data as $item) {
            if (in_array($meal, $item["availableMeals"])) {
                $restaurantsWithLunch[] = $item["restaurant"];
            }
        }

        return array_unique($restaurantsWithLunch);
    }

    public function getDishes($restaurant)
    {
        $data = $this->getAllData();
        $dishes = [];

        foreach ($data as $item) {
            if ($item['restaurant'] == $restaurant) {
                $dishes[$item['id']] = $item['name'];
            }
        }

        return $dishes;
    }

    public function getDishOrders($dataOrders)
    {
        $data = $this->getAllData();
        $dishOrders = [];

        foreach ($data as $item) {
            foreach ($dataOrders['dish'] as $key => $idDish) {
                if ($idDish == $item['id']) {
                    $dishOrders[$idDish]['name'] = $item['name'];
                    $dishOrders[$idDish]['qty'] = $dataOrders['dish-qty'][$key];

                }
            }
        }

        return $dishOrders;
    }
}
