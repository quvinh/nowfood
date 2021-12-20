<?php

namespace App\Http\Controllers\Web;

use App\Address;
use App\Bill;
use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Info_checkout;
use App\News;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class Home extends Controller
{
    public function home() {
        // $categories = Category::all();
        // $test = DB::table('info_checkouts')->selectRaw(DB::raw('MONTH(created_at) month'))->distinct()->get();
        // $list = array();
        // foreach($test as $key => $item) {
        //     $info = DB::table('info_checkouts')
        //         // ->whereMonth('created_at', $item->month)
        //         // ->select('created_at', DB::raw('sum(info_checkouts.pay) as sum'))
        //         // ->addSelect(DB::raw('sum(info_checkouts.pay) as sum'))
        //         ->selectRaw('month("created_at") as temp')
        //         // ->groupBy('month("created_at")')
        //         ->get();
        //     array_push($list, $info);
        // }
        // dd($list);
        $product = Product::all();
        return view('index.show_product', compact('product'));
    }

    public function getProduct($id) {
        $product = Product::find($id);
        // $category_id = DB::table('categories')
        //     ->join('products', 'products.category_id', '=', 'categories.id')
        //     ->where('products.id', '=', $id)
        //     ->get('id');
        $comment = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->where('comments.product_id', $id)
            ->get();
        $related_product = DB::table('products')
            ->where('category_id', '=', $product->category->id)
            ->get();

        // dd($comment);
        return view('index.get_product', compact('product', 'comment', 'related_product'));
    }

    public function buy($id) {//id : Product
        $product = Product::find($id);
        $check_cart = DB::table('orders')->where('product_id', $id)->where('user_id', Auth::user()->id)->get('id')->count();
        $check_address = DB::table('address')->where('user_id', Auth::user()->id)->get()->count();
        // dd($check_address);
        if($check_address == 0) {
            return redirect()->route('index.add-address', $id);
        }
        if($check_cart > 0) {
            $check_bill = DB::table('bills')
                ->join('orders', 'orders.id', '=', 'bills.order_id')
                ->where('orders.product_id', $id)
                ->get('bills.id')
                ->count();
            if($check_bill > 0) {
                return redirect()->route('index.bill', Auth::user()->id);
            }
            return redirect()->route('index.cart', Auth::user()->id);
        }
        return view('index.buy_product', compact('product'));
    }

    public function buyProduct(Request $request, $id) {//id of Product
        $request->validate([
            'price' => 'required',
            'quantity' => 'required|min:1',
            'total' => 'required'
        ]);
        $product_ck = DB::table('products')
            ->where('id', $id)
            ->get('quantity');
        // dd($product_ck[0]->quantity - $request->quantity);
        if($product_ck[0]->quantity > 0) {
            Product::where('id', $id)->update(['quantity' => $product_ck[0]->quantity - $request->quantity]);
            $order = new Order();
            $order->product_id = $id;
            $order->user_id = Auth::user()->id;
            $order->quantity = $request->quantity;
            $order->save();

            $get_order = DB::table('orders')->where('product_id', $id)->where('user_id', Auth::user()->id)->get();
            $bill = new Bill();
            $bill->order_id = $get_order[0]->id;
            $bill->payment = $request->total;
            $bill->status = 0;
            $bill->save();

            return redirect()->route('index.bill');
        } else {
            return redirect('buy/'.$id);
        }
    }

    public function bill() { //id of User
        $bill = DB::table('bills')
            ->join('orders', 'bills.order_id', '=', 'orders.id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('products.id as product_id', 'products.name', 'products.image', 'products.price', 'orders.quantity', 'bills.payment', 'bills.status', 'bills.id')
            ->where('orders.user_id', '=', Auth::user()->id)
            ->get();
        return view('index.bill', compact('bill'));
    }

    // public function billReceived($id) { //id: bill
    //     DB::table('bills')->where('id', $id)->update(['status' => 1]);
    //     return redirect()->route('index.bill');
    // }

    public function getCart() {
        $id_order = DB::table('bills')->get('order_id');
        $get_id = array();
        foreach($id_order as $item) {
            array_push($get_id, $item->order_id);
        }
        $info = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('products.name', 'products.price', 'products.image', 'orders.*')
            ->addSelect(DB::raw('(products.price * orders.quantity) as total'))
            ->where('user_id', Auth::user()->id)
            ->whereNotIn('orders.id', $get_id)
            ->get();
        // dd($info);
        $sub_price = 0;
        foreach($info as $item) {
            $sub_price += $item->total;
        }
        $all_price = $sub_price + 10000;
        // dd($all_price);
        return view('index.cart', compact('info', 'sub_price', 'all_price'));
    }

    public function buyCart(Request $request, $id) {//id: Product
        $request->validate([
            'product_id' => 'required',
            'total' => 'required',
        ]);
        $check_address = DB::table('address')->where('user_id', Auth::user()->id)->get()->count();
        if($check_address == 0) {
            return redirect()->route('index.add-address', $id);
        }
        $get_order = DB::table('orders')->where('product_id', $id)->where('user_id', Auth::user()->id)->get();
        $bill = new Bill();
        $bill->order_id = $get_order[0]->id;
        $bill->payment = $request->total;
        $bill->status = 0;
        $bill->save();

        return redirect()->route('index.bill');
    }

    public function cancelCart($id) {//id: Order
        // $request->validate(([
        //     'id' => 'required'
        // ]));
        $order_ck = DB::table('orders')->where('id', $id)->get();
        // dd($order_ck[0]);
        Product::where('id', $order_ck[0]->product_id)->update(['quantity' => $order_ck[0]->quantity]);
        DB::table('orders')->where('id', $id)->delete();
        return redirect()->route('index.cart');
    }

    public function addAddress($id) { //id: Product
        return view('index.add_address', compact('id'));
    }

    public function storeAddress(Request $request, $id) {//id: Product
        $request->validate([
            'user_id' => 'required',
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Address::create($request->all());
        return redirect()->route('index.buy', $id);
    }

    public function storeComment(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'comment' => 'required'
        ]);
        // dd($request);
        Comment::create($request->all());
        return redirect()->route('index.get-product', $request->product_id);
    }

    public function getInfoCheckout() {
        $info = DB::table('info_checkouts')->where('user_id', Auth::user()->id)->get();
        // $user_info = DB::table('info_checkouts')
        //     ->select('name_product', DB::raw('count(*) as total'))
        //     ->groupBy('name_product')
        //     ->get();
        // dd($user_info);
        return view('index.checkout', compact('info'));
    }

    public function storeInfoCheckout(Request $request, $id) {//id: bill
        // $request->validate([
        //     'user_id',
        //     'name_product',
        //     'image_product',
        //     'quantity',
        //     'pay'
        // ]);
        $bill = DB::table('bills')
            ->join('orders', 'bills.order_id', '=', 'orders.id')
            ->where('bills.id', '=', $id)
            ->get('order_id');
        // dd($bill[0]->order_id);
        $info = DB::table('orders')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('products.name', 'products.image', 'orders.quantity')
            ->addSelect(DB::raw('(products.price * orders.quantity+10000) as pay'))
            ->where('orders.id', $bill[0]->order_id)
            ->get();
        // dd($info[0]);

        $info_checkout = new Info_checkout();
        $info_checkout->user_id = Auth::user()->id;
        $info_checkout->name_product = $info[0]->name;
        $info_checkout->image_product = $info[0]->image;
        $info_checkout->quantity = $info[0]->quantity;
        $info_checkout->pay = $info[0]->pay;
        $info_checkout->save();
        DB::table('bills')->where('id', $id)->delete();
        DB::table('orders')->where('id', $bill[0]->order_id)->delete();

        Mail::send('email.mailRespond', ['name' => $info[0]->name], function($message) {
            $message->to(Auth::user()->email);
            $message->subject('Thank you');
        });

        return redirect()->route('index.bill');
    }

    public function searchProduct(Request $request) {
        $request->validate(['name']);
        $product = DB::table('products')->where('name', 'like', $request->name.'%')->get();
        // dd($product);
        return view('index.show_product', compact('product'));
    }

    public function news() {
        $news = News::all();
        return view('index.news', compact('news'));
    }

    public function singleNews($id) {
        $news = News::find($id);
        return view('index.single_news', compact('news'));
    }

    public function listProducts($id) {
        // $categories = Category::all();
        $category = Category::find($id);
        $product = DB::table('products')->where('category_id', $id)->get();
        return view('index.list_products',compact('category', 'product'));
    }

    public function contact() {
        return view('index.contact');
    }
}
