<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::all();
        return view('cars.index', ['cars' => $cars]);
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        Car::create([
            'model' => $request->model,
            'city' => $request->city,
            'volume' => $request->volume,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,
            'image' => $request->image,
        ]);
        return redirect()->route('cars.index');
    }

    public function show(Car $car)
    {
        return view('cars.show', ['car' => $car]);
    }

    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);
    }

    public function update(Request $request, Car $car)
    {
        $car->update([
            'image' => $request->image,
            'model' => $request->model,
            'city' => $request->city,
            'volume' => $request->volume,
            'mileage' => $request->mileage,
            'transmission' => $request->transmission,

        ]);
        return redirect()->route('cars.index');

    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
