<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function admin()
    {
        return view('web.master');
    }

    public function category()
    {
        $category = Category::all();
        return view('web.category.index', compact('category'));
    }

    public function createCategory()
    {
        return view('web.category.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('category');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('web.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('category');
    }

    public function deleteCategory($id)
    {
        DB::table('products')->where('category_id', $id)->delete();
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category');
    }

    /////////////////////////////////////////

    public function product()
    {
        $product = Product::all();
        return view('web.product.index', compact('product'));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        return view('web.product.get', compact('product'));
    }

    public function createProduct()
    {
        $category = Category::all();
        return view('web.product.create', compact('category'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if (strcasecmp($extension, 'jpg') === 0 || strcasecmp($extension, 'png') === 0 || strcasecmp($extension, 'jepg') === 0) {
                $name = Str::random(5) . '_' . $name_file;

                while (file_exists('images/' . $name)) {
                    $name = Str::random(5) . '_' . $name_file;
                }

                $file->move('images', $name);

                $product = new Product();
                $product->category_id = $request->category_id;
                $product->name = $request->name;
                $product->price = $request->price;
                $product->image = $name;
                $product->description = $request->description;
                $product->quantity = $request->quantity;
                $product->save();

                return redirect()->route('product')->with('success', 'Created successfully');
            }
        } else {
            return redirect()->route('product')->with('error', 'Error');
        }
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('web.product.edit', compact('product', 'category'));
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if (file_exists('images/' . $product->image)) {
            File::delete('images/' . $product->image);
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $name = Str::random(5) . '_' . $name_file;
            while (file_exists('images/' . $name)) {
                $name = Str::random(5) . '_' . $name_file;
            }
            $file->move('images', $name);
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->image = $name;
            $product->description = $request->description;
            $product->quantity = $request->quantity;
            $product->save();
        }

        // $product->update($request->all());
        return redirect()->route('product');
    }

    public function deleteProduct($id)
    {
        DB::table('orders')->where('product_id', $id)->delete();
        $product = Product::find($id);
        if (file_exists('images/' . $product->image)) {
            File::delete('images/' . $product->image);
        }
        $product->delete();
        return redirect()->route('product');
    }
    /////////////////////////////////////////

    public function getOrder()
    {
        $order = Order::all();
        return view('web.order.get', compact('order'));
    }

    public function storeOrder(Request $request)
    {
        // dd($request);
        $request->validate([
            'product_id' => 'required',
            'user_id' => 'required'
        ]);
        $product_ck = DB::table('products')
            ->where('id', $request->product_id)
            ->get('quantity');
        // dd(--$product_ck[0]->quantity);
        $order_ck = DB::table('orders')
            ->where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->get()
            ->count();
        // dd($order_ck);
        $bill_ck = DB::table('bills')
            ->join('orders', 'orders.id', '=', 'bills.order_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->where('orders.product_id', $request->product_id)
            ->where('orders.user_id', $request->user_id)
            ->get()
            ->count();
        // dd($checkout_bill_add_order);
        if($product_ck[0]->quantity > 0) {
            if($order_ck > 0) {
                $order = DB::table('orders')->where('product_id', $request->product_id)->where('user_id', $request->user_id)->get();
                if($bill_ck == 0) {
                    Product::where('id', $request->product_id)->update(['quantity' => --$product_ck[0]->quantity]);
                    Order::where('product_id', $request->product_id)->where('user_id', $request->user_id)->update(['quantity' => ++$order[0]->quantity]);
                } else {
                    return redirect()->route('index.bill');
                }
            } else {
                Product::where('id', $request->product_id)->update(['quantity' => --$product_ck[0]->quantity]);
                $order = new Order();
                $order->product_id = $request->product_id;
                $order->user_id = $request->user_id;
                $order->quantity = 1;
                $order->save();
            }
        }
        return redirect('/');
    }
}
