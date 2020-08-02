<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = [
            ['type' => 'hawaiian', 'base' => 'cheese crust', 'price' => '10'],
            ['type' => 'mexican', 'base' => 'garlic crust', 'price' => '15'],
            ['type' => 'chicken', 'base' => 'mayo crust', 'price' => '20'],
        ];

        return view('pizzas', [
            'pizzas' => $pizzas,
            'name' => request('name'),
            'age' => request('age')
        ]);
    }
    public function show($id){
        return view('details', [
            'id' => $id,
        ]);
    }
}
