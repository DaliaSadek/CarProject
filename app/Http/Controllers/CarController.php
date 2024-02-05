<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Car;
use App\Traits\Common;


class CarController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('admin/cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin/addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'carTitle' => 'required|string|max:255',
            'luggage' => 'required',
            'doors' => 'required',
            'price' => 'required',
            'passengers' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'categoryId' => 'required'
        ]);

        $data['active'] = isset($request->active);
        $data['image'] = $this->uploadFile($request->image, 'assets/images');

        Car::create($data);
        return redirect('admin/cars');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::get();

        return view('admin/editCar', compact(['categories', 'car']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        return dd($request);

        $data = $request->validate([
            'carTitle' => 'required|string|max:255',
            'luggage' => 'required',
            'doors' => 'required',
            'price' => 'required',
            'passengers' => 'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'categoryId' => 'required'
        ]);

        $data['active'] = isset($request->active);

        if(is_file($request->image))
            $data['image'] = $this->uploadFile($request->image, 'assets/images');

        Car::where('id', $id)->update($data);

        return redirect('admin/cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)->delete();

        return redirect('admin/cars');
    }
}
