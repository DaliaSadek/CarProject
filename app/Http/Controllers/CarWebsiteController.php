<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarWebsiteController extends Controller
{
    public function index() {
        return view('index');
    }

    public function listing() {
        return view('listing');
    }

    public function testimonial() {
        return view('testimonial');
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
        return view('single');
    }
}
