<?php

namespace App\Http\Controllers;

class HomeController extends Controller
// Render view of home
{
    public function index()
        {
            return view('home.index');
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
