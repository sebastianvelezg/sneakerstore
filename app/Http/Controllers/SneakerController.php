<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sneaker;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class SneakerController extends Controller
{
    public function index($id)
    {
        $viewData = [];
        $viewData["title"] = "Name Sneaker - Sneaker";
        $viewData["subTitle"] = "Name of Sneaker";
        $viewData["sneaker"] = Sneaker::find($id);
        $viewData['category'] = Category::find($viewData['sneaker']->getIdCategory());
        $viewData['images'] = File::files(public_path("image/sneakers/" . $viewData['sneaker']->getId()));
        return view("sneakers.index")->with("viewData", $viewData);
    }

    public function adminIndex()
    {
        $viewData = [];
        $viewData['categories'] = Category::all();
        return view('sneakers.indexAdmin')->with('viewData', $viewData);
    }

    public function adminShow($id)
    {
        $viewData = [];
        $viewData['category'] = Category::findOrFail($id);
        $viewData['sneakers'] = Sneaker::where('id_category', $id)->get();
        return view('sneakers.showAdmin')->with('viewData', $viewData);
    }

    public function create($id)
    {
        $viewData['category'] = Category::findOrFail($id);
        return view('sneakers.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Sneaker::validate($request);
        $filename = time() . $request->image->getClientOriginalName();

        $data = [
            "name" => $request->name,
            "colorway" => $request->colorway,
            "brand" => $request->brand,
            "description" => $request->description,
            "releasedate" => $request->releasedate,
            "retailprice" => $request->retailprice,
            "price" => $request->price,
            "id_category" => $request->idCategory,
        ];

        $sneaker = Sneaker::create($data);
        $sneaker->setImage($filename);
        $sneaker->save();
        $request["image"]->move(public_path("image/sneakers/" . $sneaker->getId()), $filename);

        return redirect(route('admin.sneakersCategory', $request->idCategory));
    }

    public function show($id)
    {
        $viewData = [];
        $viewData['sneaker'] = Sneaker::findOrFail($id);
        $viewData['category'] = Category::find($viewData['sneaker']->getIdCategory());
        $viewData['images'] = File::files(public_path("image/category/" . $viewData['sneaker']->getId()));
        return view('sneaker.showSneaker')->with('viewData', $viewData);
    }

    // Delete images of a sneaker
    public function deleteImage($param)
    {
        $params = explode(" $- ", $param);
        File::delete(public_path('image/sneakers/' . $params[0] . '/' . $params[1]));
        return back();
    }

    public function addImages(Request $request, $id)
    {
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $image) {
                $filename = time() . $image->getClientOriginalName();
                $image->move(public_path("image/sneakers/" . $id), $filename);
            }
        }
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['sneaker'] = Sneaker::findOrFail($id);
        $viewData['categories'] = Category::all();
        return view('sneakers.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Sneaker::validateUpdate($request);
        $sneaker = Sneaker::find($id);
        if (isset($request->image)) {
            File::delete(public_path('image/sneakers/' . $sneaker->getId() . '/' . $sneaker->getImage()));
            $filename = time() . $request->image->getClientOriginalName();
            $request["image"]->move(public_path("image/sneakers/" . $sneaker->getId()), $filename);
            $sneaker->setImage($filename);
        }

        $sneaker->setName($request->name);
        $sneaker->setColorway($request->colorway);
        $sneaker->setBrand($request->brand);
        $sneaker->setDescription($request->description);
        $sneaker->setReleasedate($request->releasedate);
        $sneaker->setRetailprice($request->retailprice);
        $sneaker->setPrice($request->price);
        $sneaker->setIdCategory($request->idCategory);

        $sneaker->save();

        return redirect(route('admin.sneakersCategory', $sneaker->getIdCategory()));

        Sneaker::whereId($id)->update($validatedData);
        return back();
    }

    public function destroy($id)
    {
        $snekaer = sneaker::find($id);
        $idCategory = $snekaer->getIdCategory();
        File::deleteDirectory(public_path('image/sneakers/' . $snekaer->getId() . '/'));
        $snekaer->delete();
        return redirect(route('admin.sneakersCategory', $idCategory));
        
        Sneaker::destroy($id);
        return redirect(route('admin.sneaker'));
    }
}
