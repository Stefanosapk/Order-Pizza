<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = Pizza::all();
//        $pizzas = Pizza::orderBy('name', 'desc')->get();
//        $pizzas = Pizza::where('type', 'hawaiian')->get();
//        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [
            'pizzas' => $pizzas,
            'name' => request('name'),
            'age' => request('age')
        ]);
    }
    public function show($id){

        $pizza = Pizza::FindorFail($id);
        return view('pizzas.show', ['pizza' => $pizza,]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){
//        error_log(request('name'));

        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->base = request('base');
        $pizza->type = request('type');
        $pizza->toppings = request('toppings');

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }
}
