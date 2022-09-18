<?php

namespace App\Http\Controllers;
use App\Models\Sneaker;
use App\Models\Clothe;
use App\Models\Accessory;
use App\Models\Category;

class HomeController extends Controller
// Render view of home
{
  // Home index
  public function index()
  {
    $viewData = [];
    $viewData['title'] = 'Home Page - Sneaker';
    $viewData['latestSneakers'] = Sneaker::orderBy('created_at', 'desc')->limit(5)->get();
    $viewData['cheapestSneakers'] = Sneaker::orderBy('price', 'asc')->limit(5)->get();
    $viewData['randomProducts'] = Sneaker::inRandomOrder()->limit(4)->get();
    $viewData['latestClothes'] = Clothe::orderBy('created_at', 'asc')->limit(5)->get();
    $viewData['accessories'] = Accessory::inRandomOrder()->limit(4)->get();
    $viewData['categories'] = Category::inRandomOrder()->limit(3)->get();
    $viewData['sneakers'] = Sneaker::all();
    return view('home.index')->with('viewData', $viewData);
  }
// About page
  public function about()
  {
    $viewData = [];
    $viewData['title'] = 'About Page - Sneaker';
    return view('home.about')->with('viewData', $viewData);
  }
// Support page
  public function support()
  {
    $viewData = [];
    $viewData['title'] = 'Support Page - Sneaker';
    return view('home.support')->with('viewData', $viewData);
  }
}
