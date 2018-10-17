<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
        ->orderBy ('name', 'asc')
        ->get();

        $view = view('categories/index',[
            'categories'=> $categories
        ]);
        return $view;
    }
}
