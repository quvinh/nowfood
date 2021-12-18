<?php

namespace App\Http\Controllers;

use App\Category;
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
            $view->with('categories', $categories);
        });

        // view()->composer('*', function($view) {
        //     $countCart = DB::table('orders')->where('user_id', Auth::user()->id)->count();
        //     dd($countCart);
        //     $view->with('countCart', $countCart);
        // });
    }
}
