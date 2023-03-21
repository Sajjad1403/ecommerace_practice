<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:150',
            'quantity' => 'required',
            'image' => 'image|mimes:png,jpg,gif,jpeg,svg',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;

        if ($request->File('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();

            if (!(Storage::disk('public')->exists('product_image'))) {
              
                Storage::disk('public')->makeDirectory('product_image');
            }
            storage::disk('public')->putFileAs('product_image', $file, $fileName);
            $product->image = $fileName;
        }

        $product->save();
        toastr()->success('Product Created Successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = $product;
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
     $data = $request->validate([
            'name' => 'required|max:150',
            'quantity' => 'required',
            'image' => 'sometimes|image|mimes:png,jpg,gif,jpeg,svg',
        ]);
        // if ($request->has('image')) {
        //     $path = Storage::disk('public')->exists('product_image/', $product->image);
        //     dd($path);
        //     unlink($path);
        // }
        
        // if(file_exists(public_path('storage/product_image/'.$product->image)))
        // {
        //     unlink(public_path('storage/product_image/'.$product->image));
        // }
        
        // dd($product,$fileName,'stop');
        if ($request->hasFile('image')) {
            Storage::disk('public/product_image')->delete($product->image);

            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();

            if (!(Storage::disk('public')->exists('product_image'))) {
              
                Storage::disk('public')->makeDirectory('product_image');
            }
            storage::disk('public')->putFileAs('product_image', $file, $fileName);
            $data['image'] = $fileName;
        }
       $product->update($data);

        toastr()->success('Product Updated Successfully.');
        return redirect()->route('products.index');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toastr()->error('Product Deleted Successfully!');
        return redirect()->route('products.index');
    }
}
