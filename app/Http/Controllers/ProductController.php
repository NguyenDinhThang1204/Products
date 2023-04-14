<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',['products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required',
            'gender'         =>  'required',
            'price'          =>  'required',
            'image'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'date'          =>  'required'
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $file_name);

        $product = new Product();
        $product -> name = $request->input('name');
        $product -> email = $request->input('email');
        $product -> gender = $request->input('gender');
        $product -> price = $request->input('price');
        $product -> image = $file_name;
        $product -> date = $request->input('date');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required',
            'gender'     =>  'required',
            'price'     =>  'required',
            'image'     =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'date'      => 'required'
        ]);

        $image = $request->hidden_image;

        if($request->image != '')
        {
            $image = time() . '.' . request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $image);
        }

        $product = Product::find($request->hidden_id);

        $product->name = $request->name;
        $product->email = $request->email;
        $product->gender = $request->gender;
        $product->price = $request->price;
        $product->image = $image;
        $product->date = $request->date;
        
        $product->save();

        // return redirect('/products');
        return redirect()->route('products.index')->with('success', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Data deleted successfully');

    }
}
