<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function category() {
        $category = Category::all();
        return view('web.category.index', compact('category'));
    }

    public function createCategory() {
        return view('web.category.create');
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('category');
    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('web.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('category');
    }

    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category');
    }

    /////////////////////////////////////////

    public function product() {
        return view('web.product.index');
    }

    public function getProduct($id) {
        $category = Category::find($id);
        return view('web.product.get', compact('category'));
    }

    public function createProduct() {
        return view('web.product.create');
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if(strcasecmp($extension, 'jpg') === 0 || strcasecmp($extension, 'png') === 0 || strcasecmp($extension, 'jepg') === 0) {
                $name = Str::random(5).'_'.$name_file;

                while(file_exists('image/'.$name)) {
                    $name = Str::random(5).'_'.$name_file;
                }

                $file->move('image', $name);

                $product = new Product();
                $product->category_id = $request->category_id;
                $product->name = $request->name;
                $product->price = $request->price;
                $product->image = $name;
                $product->description = $request->description;
                $product->save();

                return redirect()->route('product')->with('success', 'Created successfully');
            }
        } else {
            return redirect()->route('product')->with('error', 'Error');
        }
    }

    public function editProduct($id) {
        $category = Category::find($id);
        return view('web.product.edit', compact('category'));
    }

    public function updateProduct(Request $request, $id) {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('product');
    }

    public function deleteProduct($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('product');
    }
}
