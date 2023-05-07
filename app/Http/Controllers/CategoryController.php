<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Tables\CategoriesTable;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('super-admin.categories.index', [
            'categories' => CategoriesTable::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name'
        ]);

        Category::create([
            'category_name' => $request->category_name
        ]);

        Toast::title('Successfully!')->message('Category Created')->success()->backdrop()->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('super-admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name,' . $category->id
        ]);

        Category::where('id', $category->id)->update([
            'category_name' => $request->category_name
        ]);

        Toast::title('Successfully!')->message('Category Updated')->info()->backdrop()->autoDismiss(3);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            Category::where('id', $category->id)->delete();
            Toast::title('Successfully!')->message('Category Deleted')->danger()->backdrop()->autoDismiss(3);
            return redirect()->back();
        } catch (\Throwable $th) {
            Toast::title('Error!')->message('Category Not Deleted')->danger()->backdrop()->autoDismiss(3);
            return redirect()->back();
        }
    }
}
