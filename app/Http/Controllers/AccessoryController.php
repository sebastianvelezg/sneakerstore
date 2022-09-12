<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accessory;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class AccessoryController extends Controller
{
    public function index($id)
    {
        $viewData = [];
        $viewData["title"] = "Name Accessory - Accessory";
        $viewData["subTitle"] = "Name of Accessory";
        $viewData["accessory"] = Accessory::find($id);
        $viewData['category'] = Category::find($viewData['accessory']->getIdCategory());
        $viewData['images'] = File::files(public_path("image/accessories/" . $viewData['accessory']->getId()));
        return view("accessories.index")->with("viewData", $viewData);
    }

    public function adminIndex()
    {
        $viewData = [];
        $viewData['categories'] = Category::all();
        return view('accessories.indexAdmin')->with('viewData', $viewData);
    }

    public function adminShow($id)
    {
        $viewData = [];
        $viewData['category'] = Category::findOrFail($id);
        $viewData['accessories'] = Accessory::where('id_category', $id)->get();
        return view('accessories.showAdmin')->with('viewData', $viewData);
    }

    public function create($id)
    {
        $viewData['category'] = Category::findOrFail($id);
        return view('accessories.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Accessory::validate($request);
        $filename = time() . $request->image->getClientOriginalName();

        $data = [
            "type" => $request->type,
            "brand" => $request->brand,
            "description" => $request->description,
            "material" => $request->material,
            "price" => $request->price,
            "id_category" => $request->idCategory,
        ];

        $accessories = Accessory::create($data);
        $accessories->setImage($filename);
        $accessories->save();
        $request["image"]->move(public_path("image/accessories/" . $accessories->getid()), $filename);

        return redirect(route('admin.accessoriesCategory', $request->idCategory));
    }

    public function show($id)
    {
        $viewData = [];
        $viewData['accessory'] = Accessory::findOrFail($id);
        $viewData['category'] = Category::find($viewData['accessory']->getIdCategory());
        $viewData['images'] = File::files(public_path("image/accessories/" . $viewData['accessory']->getId()));
        return view('accessories.show')->with('viewData', $viewData);
    }

    public function deleteImage($param)
    {
        $params = explode(" $- ", $param);
        File::delete(public_path('image/accessories/' . $params[0] . '/' . $params[1]));
        return back();
    }

    public function addImages(Request $request, $id)
    {
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $image) {
                $filename = time() . $image->getClientOriginalName();
                $image->move(public_path("image/accessories/" . $id), $filename);
            }
        }
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData['accessory'] = Accessory::findOrFail($id);
        $viewData['categories'] = Category::all();
        return view('accessories.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, $id)
    {
        Accessory::validateUpdate($request);
        $accessory = Accessory::find($id);
        if (isset($request->image)) {
            File::delete(public_path('image/accessories/' . $accessory->getId() . '/' . $accessory->getImage()));
            $filename = time() . $request->image->getClientOriginalName();
            $request["image"]->move(public_path("image/accessories/" . $accessory->getId()), $filename);
            $accessory->setImage($filename);
        }

        $accessory->setType($request->type);
        $accessory->setBrand($request->brand);
        $accessory->setDescription($request->description);
        $accessory->setMaterial($request->material);
        $accessory->setPrice($request->price);
        $accessory->setIdCategory($request->idCategory);

        $accessory->save();

        return redirect(route('admin.accessoriesCategory', $accessory->getIdCategory()));

        Accessory::whereId($id)->update($validatedData);
        return back();
    }

    public function destroy($id)
    {
        $accessory = Accessory::find($id);
        $idCategory = $accessory->getIdCategory();
        File::deleteDirectory(public_path('image/accessories/' . $accessory->getId() . '/'));
        $accessory->delete();
        return redirect(route('admin.accessoriesCategory', $idCategory));
        
        Accessory::destroy($id);
        return redirect(route('admin.accessory'));
    }
}
