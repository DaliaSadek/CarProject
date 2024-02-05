<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Car;

class CarWebsiteController extends Controller
{
    public function index() {
        $cars = Car::where('active', 1)->take(6)->get();
        $testimonials = Testimonial::where('published', 1)->take(3)->get();

        return view('index', compact(['cars', 'testimonials']));
    }

    public function listing() {
        $cars = Car::where('active', 1)->paginate(6);
        $testimonials = Testimonial::where('published', 1)->take(3)->get();

        return view('listing', compact(['cars', 'testimonials']));
    }

    public function testimonial() {
        $testimonials = Testimonial::where('published', 1)->get();
        return view('testimonial', compact('testimonials'));
    }

    public function about() {
        return view('about');
    }

    public function blog() {
        return view('blog');
    }

    public function contact() {
        return view('contact');
    }

    public function single($id) {
        $car = Car::findOrFail($id);

        return view('single', compact('car'));
    }
}
