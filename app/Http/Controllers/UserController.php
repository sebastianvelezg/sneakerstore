<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexAdmin()
  {
    $viewData = [];
    $viewData["users"] = User::all();
    $viewData["title"] = "Admin Users";
    return view('user.indexAdmin')->with('viewData', $viewData);
  }

  public function create()
  {
    $viewData["title"] = "Admin create user";
    return view('user.create')->with("viewData", $viewData);
  }

  public function store(Request $request)
  {
    User::validateRegister($request);

    $user = new User();
    $user->setName($request->name);
    $user->setEmail($request->email);
    $user->setPassword($request->password);
    $user->setRol($request->rol);

    $user->save();

    return redirect(route('admin.user', $request->idUser));
    }

    public function show($id)
  {
    $viewData = [];
    $viewData['user'] = User::where('id', $id);
    $viewData['current'] = Auth::id() == $id;
    return view('user.show')->with('viewData', $viewData);
  }
  
  public function edit($id)
  {
    $viewData = [];
    $viewData["title"] = "Admin Edit User";
    $viewData["user"] = User::find($id);
    return view('user.edit')->with('viewData', $viewData);
  }

  public function update(Request $request, $id)
  {
    User::validate($request);
    $user = User::find($id);

    $user->setName($request->name);
    $user->setEmail($request->email);
    $user->setRol($request->rol);

    $user->save();

    return back();
  }

  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect(route('admin.user'));
  }
}
