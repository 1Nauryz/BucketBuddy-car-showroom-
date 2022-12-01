<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('adm.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('adm.categories.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'code' => 'required|max:15',
        ]);
        Category::create($validated);
        return redirect()->route('adm.categories.index', ['categories' => Category::all()] )->with('success', 'You added your car!!');
    }

    public function show(Car $car)
    {
    }

    public function edit(Car $car)
    {
    }

    public function update(Request $request, Category $category)
    {
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('adm.categories.index');
    }
}
