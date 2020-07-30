<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\Category;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::latest()->paginate(10);

        return view('food.index',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('food.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'food_name'=>'required',
            'food_desc'=>'required',
            'food_price'=>'required|integer',
            'category_id'=>'required',
            'food_image'=>'required|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('food_image');
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$image_name);

        Food::create([
            'food_name'=>$request->get('food_name'),
            'food_desc'=>$request->get('food_desc'),
            'food_price'=>$request->get('food_price'),
            'category_id'=>$request->get('category_id'),
            'food_image'=>$image_name
        ]);

        return redirect()->back()->with('message','Food created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::find($id);

        return view('food.show',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);

        return view('food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'food_name'=>'required',
            'food_desc'=>'required',
            'food_price'=>'required|integer',
            'category_id'=>'required',
            'food_image'=>'mimes:png,jpg,jpeg'
        ]);

        $food = Food::find($id);
        $image_name = $food->food_image;

        if($request->hasFile('food_image')){
            $image = $request->file('food_image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$image_name);
        }

        $food->food_name = $request->get('food_name');
        $food->food_desc = $request->get('food_desc');
        $food->food_price = $request->get('food_price');
        $food->category_id = $request->get('category_id');
        $food->food_image = $image_name;

        $food->save();

        return redirect()->route('food.index')->with('message','Food Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();

        return redirect()->route('food.index')->with('message','Food Deleted!');
    }

    public function listFoods() {
        $categories = Category::with('foods')->get();

        return view('index',compact('categories'));
    }
}
