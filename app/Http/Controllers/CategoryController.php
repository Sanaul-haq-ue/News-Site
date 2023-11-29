<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class CategoryController extends Controller
{
    use WithPagination;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.category.manage-category',[
            'categories'=>Category::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.category.category-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=> 'required'
        ]);

        Category::saveCategory($request);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//        $category = Category::find($id);
//        if($category->status == 1){
//            $category->status = 0;
//        }else{
//            $category->status = 1;
//        }
//        $category->save();
//        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.category.edit-category',[
            'categories'=>Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Category::updateCategory($request, $id);
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::find($id);
        if (!$category) {
            // Handle case where category is not found
            abort(404);
        }
        $category->delete();
        return redirect()->route('categories.index');
    }
}
