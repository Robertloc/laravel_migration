<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
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

    public function create () {
        $category = new Category;

        return view ('categories/edit')->with(compact('category'));
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
 
        return view('categories/edit')->with(compact('category'));
        // This function uses the model class to find a new record in the database with the id, when it finds it, it prepares the view and put the category variable inside the name category 
    }

    public function store(Request $request, $id = null) {
        $this->validate($request, [
            'name' => "required|unique:categories,name,{$id},id"
        ]);

        //validation, we can validate values against certain constrains and specify rules. We specify that name is required, its value should be unique within table categories among names, EXCEPT for id. Which means we can submit something with the same name but with a different id. There are other rules we can apply to this field. It has a look at the data from request, and the second argument is the list of validation rules. If it finds an error, it doesn't allow us to move any further, it displays the errors. 
         
        $category = Category::findOrNew($id);
        //findOeNew is a method that finds an object with the ID in the database, or prepare a new blank object if it doesn't find one.
         
        $category->fill($request->only([
            'name'
            //allows us to fill the object with multiple pieces of data at once from the 'request.' 
        ]));
         
        $category->save();
        //method that allows us to create a new record or update an existing one. 
         
        session()->flash('success_message', 'The category was successfully saved.');
        //allows us to inform the user of success. placed in the session for one request only 
         
        return redirect()->route('categories.edit', ['id' => $category->id]);
        //redirects us back to the edit form, and gives the record an ID. 
    }
}
