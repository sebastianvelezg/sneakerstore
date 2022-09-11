<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clothe;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ClotheController extends Controller
{
    public function index($id)
    {
        $viewData = [];
        $viewData["title"] = "Name Clothe - Clothe";
        $viewData["subTitle"] = "Name of Clothe";
        $viewData["clothe"] = Clothe::find($id);
        $viewData['category'] = Category::find($viewData['clothe']->getIdCategory());
        $viewData['images'] = File::files(public_path("image/clothes/" . $viewData['clothe']->getId()));
        return view("clothes.index")->with("viewData", $viewData);
    }

    public function adminIndex()
    {
        $viewData = [];
        $viewData['categories'] = Category::all();
        return view('clothes.indexAdmin')->with('viewData', $viewData);
    }

    public function adminShow($id)
    {
        $viewData = [];
        $viewData['category'] = Category::findOrFail($id);
        $viewData['clothes'] = Clothe::where('id_category', $id)->get();
        return view('clothes.showAdmin')->with('viewData', $viewData);
    }

    public function create($id)
    {
        $viewData['category'] = Category::findOrFail($id);
        return view('clothes.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Clothe::validate($request);
        $filename = time() . $request->image->getClientOriginalName();

        $data = [
            "type" => $request->type,
            "brand" => $request->brand,
            "description" => $request->description,
            "releasedate" => $request->releasedate,
            "retailprice" => $request->retailprice,
            "price" => $request->price,
            "id_category" => $request->idCategory,
        ];

        $clothes = Clothe::create($data);
        $clothes->setImage($filename);
        $clothes->save();
        $request["image"]->move(public_path("image/clothes/" . $clothes->getid()), $filename);

        return redirect(route('admin.clothesCategory', $request->idCategory));
    }

    public function show($id)
    {
        $viewData = [];
        $viewData['clothe'] = Clothe::findOrFail($id);
        $viewData['category'] = Category::find($viewData['clothe']->getIdCategory());
        $viewData['images'] = File::files(public_path("image/clothes/" . $viewData['clothe']->getId()));
        return view('clothes.show')->with('viewData', $viewData);
    }

    public function deleteImage($param)
    {
        $params = explode(" $- ", $param);
        File::delete(public_path('image/clothes/' . $params[0] . '/' . $params[1]));
        return back();
    }

    public function addImages(Request $request, $id)
    {
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $image) {
                $filename = time() . $image->getClientOriginalName();
                $image->move(public_path("image/clothes/" . $id), $filename);
            }
        }
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['clothe'] = Clothe::findOrFail($id);
        $viewData['categories'] = Category::all();
        return view('clothes.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Clothe::validateUpdate($request);
        $clothe = Clothe::find($id);
        if (isset($request->image)) {
            File::delete(public_path('image/clothes/' . $clothe->getId() . '/' . $clothe->getImage()));
            $filename = time() . $request->image->getClientOriginalName();
            $request["image"]->move(public_path("image/clothes/" . $clothe->getId()), $filename);
            $clothe->setImage($filename);
        }

        $clothe->setType($request->type);
        $clothe->setBrand($request->brand);
        $clothe->setDescription($request->description);
        $clothe->setReleasedate($request->releasedate);
        $clothe->setRetailprice($request->retailprice);
        $clothe->setPrice($request->price);
        $clothe->setIdCategory($request->idCategory);

        $clothe->save();

        return redirect(route('admin.clothesCategory', $clothe->getIdCategory()));

        Clothe::whereId($id)->update($validatedData);
        return back();
    }

    public function destroy($id)
    {
        $clothe = clothe::find($id);
        $idCategory = $clothe->getIdCategory();
        File::deleteDirectory(public_path('image/clothes/' . $clothe->getId() . '/'));
        $clothe->delete();
        return redirect(route('admin.clothesCategory', $idCategory));
        
        Clothe::destroy($id);
        return redirect(route('admin.clothe'));
    }
}
