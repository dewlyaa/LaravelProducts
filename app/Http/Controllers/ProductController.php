<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        $data = DB::table("products")->get();
        return view('product.index',['products'=>$data]);
    } 

    public function deleteProduct($id){
        $delete=DB::table("products")
        ->where("id", "=", $id)
        ->delete();

        return redirect('/products')->with("success", "Product deleted successfully");
    }

    public function addProduct(){
        return view('product.addProduct');
    }

    public function saveProduct(Request $req){
        //dd($req);
        $validated=$req->validate([
            "description"=>['required','min:1'],
            "quantity"=>['required','min:1'],
            "price"=>['required','min:1'],
        ]);
        //dd($validated);
        $data=Product::create($validated);
        return redirect("/products")->with('success', 'Product added successfully.');
    }

    public function editProduct($id){
        $data=Product::findOrFail($id);
        return view('product.editProduct',['product'=>$data]);
    }

    public function updateProduct(Request $req){
        $req->validate([
            "description"=>['required','min:1'],
            "quantity"=>['required','min:1'],
            "price"=>['required','min:1']
        ]);

        $data=Product::find($req->id);
        $data->description=$req->description;
        $data->quantity=$req->quantity;
        $data->price=$req->price;

        $data->save();
        return redirect("/products")->with('success', 'Product updated successfully.');
    }

}

