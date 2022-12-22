<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function carsByCat(Category $category)
    {
        return view('cars.index', ['cars' => $category->cars, 'categories' => Category::all()]);

    }

    public function favorites(Car $car)
    {
        $favorite_car = Auth::user()->carsFavorites()->where('car_id', $car->id)->first();
        if ($favorite_car != null)
        {
            Auth::user()->carsFavorites()->detach($car->id);
            return back()->with('delFavAdd', 'You deleted car from favorites!');
        }
        else {
            Auth::user()->carsFavorites()->attach($car->id);
            return back()->with('favAdd', 'You added car to favorites!');
        }
    }



    public function unrate(Car $car)
    {
        $carsRated = Auth::user()->carsRated()->where('car_id', $car->id)->first();
        if ($carsRated != null)
            Auth::user()->carsRated()->detach($car->id);
        return back();
    }
    public function dMessage(Car $car)
    {
        $messageUser = Auth::user()->messageUser()->where('car_id', $car->id)->first();
        if ($messageUser != null)
            Auth::user()->messageUser()->detach($car->id);
        return back();
    }

    public function rate(Car $car, Request $request)
    {
        $request->validate([
            'rating' => 'required|min:1|max:5'
        ]);

        $carsRated = Auth::user()->carsRated()->where('car_id', $car->id)->first();
        if ($carsRated != null)
            Auth::user()->carsRated()->updateExistingPivot($car->id, ['rating' => $request->input('rating')]);
        else
            Auth::user()->carsRated()->attach($car->id, ['rating' => $request->input('rating')]);
        return back();
    }

    public function message(Request $request, Car $car)
    {
        $request->validate([
            'message' => 'required'
        ]);
        Auth::user()->messageUser()->attach($car->id,['message' => $request->input('message')]);
        return back();
//        $request->validate([
//            'message' => 'required'
//        ]);
//        $scar = Auth::user()->messageUser()->where('car_id', $car->id)->first();
//
//        if ($scar != null)
//            Auth::user()->messageUser()->updateExistingPivot($car->id, ['message' => $request->input('message')]);
//        else
//            Auth::user()->messageUser()->attach($car->id,['message' => $request->input('message')]);
////        Auth::user()->messageUser()->attach($car->id,['message' => $request->input('message')]);
//        return back();
    }
    public function updateMes(Car $car, Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);
        Auth::user()->messageUser()->updateExistingPivot($car->id, ['message' => $request->input('message')]);
        return back();
    }

    public function storeMes(Request $request, Car $car)
    {
        $request->validate([
            'message' => 'required'
        ]);
        $scar = Auth::user()->messageUser()->where('car_id', $car->id)->first();

        if ($scar != null)
            Auth::user()->messageUser()->updateExistingPivot($car->id, ['message' => $request->input('message')]);
        else
            Auth::user()->messageUser()->attach($car->id,['message' => $request->input('message')]);
//        Auth::user()->messageUser()->attach($car->id,['message' => $request->input('message')]);
        return back();
    }


    public function showMessage(Car $car)
    {
        $scar = $car->messageToCar()->get();
        return view('cars.message', ['cars' => $scar , 'car' => $car, 'users' => User::all()]);
    }

    public function index(Car $car)
    {
        $fav = 0;
        if (Auth::check())
        {
            $favorite_car = Auth::user()->carsFavorites()->where('car_id', $car->id)->first();
            if ($favorite_car != null)
            {
                $fav = $favorite_car->car_id;
            }
        }
        return view('cars.index', ['cars' => Car::all(), 'categories' => Category::all(), 'fav' => $fav]);
    }

    public function showFav()
    {
        $sfav = Auth::user()->carsFavorites()->get();
        return view('cars.showFav', ['cars' => $sfav]);
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
            'price' => 'required|max:20',
            'phone' => 'required|max:20',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);

        $fileName = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('cars', $fileName, 'public');
        $validated['image'] = '/storage/'.$image_path;

        Car::create($validated + ['user_id' => Auth::user()->id]);
        return redirect()->route('cars.index', ['categories' => Category::all()] )->with('success', 'You added your car!!');
    }

    public function upBalance()
    {
       return view('cars.balance');
    }

    public function balanceStore(Request $request)
    {
        Auth::user()->update([
                'balance' => Auth::user()->balance + $request->input('balance'), 'required|numeric',
        ]);
        return redirect()->route('cars.index')->with('balanceup', 'You have successfully replenished the balance!!');
    }

    public function buyCar(Car $car)
    {
        if (Auth::user()->balance >= $car->price) {
            Auth::user()->update([
                'balance' => Auth::user()->balance - $car->price, 'required|numeric',
            ]);
            $car->delete();
            return redirect()->route('cars.index')->with('buy', 'Congratulations on your purchase!!');
        }
        else
        {
            return redirect()->route('cars.index')->with('fail', 'Your balance is missing!!');
        }
    }

    public function show(Car $car)
    {
        $myRating = 0;
        if (Auth::check())
        {
            $carsRated = Auth::user()->carsRated()->where('car_id', $car->id)->first();
            if ($carsRated != null)
                $myRating = $carsRated->pivot->rating;
        }
        $avgRating = 0;
        $sum = 0;
        $ratedUsers = $car->usersRated()->get();
        foreach ($ratedUsers as $ru)
        {
            $sum += $ru->pivot->rating;
        }
        if (count($ratedUsers) > 0 )
            $avgRating = $sum/count($ratedUsers);
        return view('cars.show', ['car' => $car , 'myRating' => $myRating, 'avgRating' => $avgRating]);
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
            'price' => 'required|max:20',
            'phone' => 'required|max:20',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id' => 'required|numeric|exists:categories,id',
        ]);
        $fileName = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('cars', $fileName, 'public');
        $validated['image'] = '/storage/'.$image_path;

        $car->update($validated);
        return redirect()->route('cars.index')->with('successedit', 'The change was successful!!');

    }
    public function destroy(Car $car)
    {
        $this->authorize('delete', $car);
        $car->delete();
        return redirect()->route('cars.index')->with('delete', 'Removal was successful!!');
    }
}
