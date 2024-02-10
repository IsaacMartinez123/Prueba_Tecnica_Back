<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $products = Product::all();
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'quantity' => 'required|integer',
                'code' => 'required|unique:products,code',
            ]);

            Product::create([
                "name" => $validatedData['name'],
                "price" => $validatedData['price'],
                "quantity" => $validatedData['quantity'],
                "code" => $validatedData['code'],
            ]);

            return response()->json("Successfully Created Product");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        
    }

    public function show($id)
    {   
        try {
            $product = Product::find($id);
            if ($product !== null) {
                return response()->json($product);
            }else{
                return response()->json("Product Not Found");
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        
    }

    public function update(Request $request, string $id)
    {   
        try {
            $product = Product::find($id);
            if ($product !== null) {
                $validatedData = $request->validate([
                    'name' => 'required|max:70|min:3',
                    'price' => 'required|numeric',
                    'quantity' => 'required|integer',
                    'code' => 'required|max:3|unique:products,code,' . $id,
                ]);
    
                $product->update([
                    "name" => $validatedData['name'],
                    "price" => $validatedData['price'],
                    "quantity" => $validatedData['quantity'],
                    "code" => $validatedData['code'],
                ]);
    
                return response()->json("Successfully Edited Product");
            } else {
                return response()->json("Product Not Found");
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
        
    }

    public function destroy(string $id)
    {
        try {
            $product = Product::find($id);
            if ($product !== null) {
                $product->delete();
                return response()->json("Product Successfully Removed");
            }else{
                return response()->json("Product Not Found");
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }
}
