<?php

namespace App\Http\Controllers;

use App\Category;
use App\Info_checkout;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // $categories = Category::all();
        // view()->share('categories', $categories);
        view()->composer('*', function($view) {
            $categories = Category::all();
            $tableCheckout = Info_checkout::all();
            $statisticalCheckout = DB::table('info_checkouts')
                ->select('name_product', DB::raw('sum(pay) as total'))
                ->groupBy('name_product')
                ->orderBy('total', 'desc')
                ->get();
            $view->with('categories', $categories)
                ->with('tableCheckout', $tableCheckout)
                ->with('statisticalCheckout', $statisticalCheckout);
            // $view->compact('categories', 'tableCheckout', 'statisticalCheckout');
        });
    }
}
