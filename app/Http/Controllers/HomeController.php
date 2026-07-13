<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::active()->latest()->take(6)->get();
        return view('home', compact('galleries'));
    }

    public function about()
    {
        return view('about');
    }

    public function visiMisi()
    {
        return view('visi-misi');
    }

    public function gallery()
    {
        $galleries = Gallery::active()->latest()->paginate(12);
        return view('gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('contact');
    }
}
