<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $category = $request->category;

        $query = Restaurant::query();
        if($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if($category) {
            $query->whereHas('category', function($q) use ($category){ $q->where('name', 'like', '%' . $category . '%');
            });
        }
        $restaurants = $query->simplePaginate(5);
        // 2ページ目以降も検索が反映されるようにする
        $restaurants->appends(compact('name', 'category'));

        // 検索方法（拡張性がない）
        // if(!empty($name)) {
        //     $restaurants = Restaurant::where('name', 'like', '%' . $name . '%');
        //     nameで検索します。like
        // } else {
        //     $restaurants = Restaurant::all();
        // }

        // $restaurants = Restaurant::simplepaginate(10);
        return view('restaurants.index', compact('restaurants'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.show', compact('restaurant'));
    }
}
