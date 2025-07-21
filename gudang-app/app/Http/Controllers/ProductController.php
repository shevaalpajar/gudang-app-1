<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('q') && $request->q) {
            $query->where('name', 'like', '%'.$request->q.'%');
        }
        $products = $query->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);
        Product::create($request->only(['name', 'price', 'category_id']));
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $categories = \App\Models\Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
        ]);
        $product = Product::where('product_id', $id)->firstOrFail();
        $product->update($request->only(['name', 'price', 'category_id']));
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();
        $product->delete();
        return redirect()->route('products.index');
    }
}
