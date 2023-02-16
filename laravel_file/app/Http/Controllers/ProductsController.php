<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Managers\FileManager;

class ProductsController extends Controller
{


    public function index()
    {
        $products = Product::query()->with(['category', 'status'])->get();

        return view('products.index', compact('products'));
    }

    public function create(Product $product)
    {
        return view('products.create', ['product' => $product]);
    }

    public function store(ProductRequest $request)
    {
        /*        $request->validate([
                    'name' => ['required','string','min:3','max:15'],
                    'price' => ['required','integer'],
                    'category_id' => ['required','integer'],
                    'status_id' => ['required','integer'],
                    'slug' => ['required','max:255'],

                    'description' => ['nullable', 'string'],
                    'image' => ['nullable'],
                    'color' => ['nullable'],
                    'size' => ['nullable'],
                ]);*/

        $product = Product::create($request->all());

        // Tikriname, ar užklausa turi failą ir ar jis yra validus paveikslėlio failas
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //    Įkeliame failą į 'public_html/img/products' aplanką
            $image = $request->file('image');
            $clientOriginalName = $image->getClientOriginalName();
            $image->move(public_path('img/products'), $clientOriginalName);
            $product->image = '/img/products/' . $clientOriginalName;
            $product->save();
        }


        return redirect()->route('products.show', $product);
    }

    public function show(Product $product)
    {

        return view('products.show', ['product' => $product]);

    }

    public function edit(Product $product){
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'status_id' => ['required', 'integer'],
            'slug' => ['required', 'max:255'],

            'description' => ['nullable', 'string'],
            'image' => ['nullable'],
            'color' => ['nullable'],
            'size' => ['nullable'],
        ]);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //    Įkeliame failą į 'public_html/img/products' aplanką
            $image = $request->file('image');
            $clientOriginalName = $image->getClientOriginalName();
            $image->move(public_path('img/products'), $clientOriginalName);
            $product->image = '/img/products/' . $clientOriginalName;
            $product->save();

    }
        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
