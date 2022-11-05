<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function carsByCat(Category $category)
    {
        return view('cars.index', ['cars' => $category->cars, 'categories' => Category::all()]);

    }

    public function index()
    {
        return view('cars.index', ['cars' => Car::all(), 'categories' => Category::all()]);
    }

    public function create()
    {
        $this->authorize('create', Car::class);
        return view('cars.create', ['cars' => Car::all(), 'categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Car::class);
        $validated = $request->validate([
            'model' => 'required|max:50',
            'city' => 'required|max:15',
            'volume' => 'required|max:10',
            'mileage' => 'required|numeric',
            'transmission' => 'required|max:20',
            'image' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);
        Car::create($validated + ['user_id' => Auth::user()->id]);
        return redirect()->route('cars.index', ['categories' => Category::all()] )->with('success', 'You added your car!!');
    }

    public function show(Car $car)
    {
        return view('cars.show', ['car' => $car]);
    }

    public function edit(Car $car)
    {
        return view('cars.edit', ['cars' => $car, 'categories' => Category::all()]);
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'model' => 'required|max:50',
            'city' => 'required|max:15',
            'volume' => 'required|max:10',
            'mileage' => 'required|numeric',
            'transmission' => 'required|max:20',
            'image' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);
        $car->update($validated);
        return redirect()->route('cars.index')->with('success', 'The change was successful!!');

    }
    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->delete();
        return redirect()->route('cars.index')->with('delete', 'Removal was successful!!');
    }
}
