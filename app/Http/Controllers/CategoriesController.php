<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::getAll();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Insert a new category into the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Categories::insert([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Delete a category by ID.
     *
     * @param int $id The ID of the category to delete.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the categories page with a success message.
     */
    public function delete($id)
    {
        Categories::deleteData($id);
        return redirect()->route('categories')->with('success', 'Data Berhasil Dihapus');
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        Categories::updateData($category_id, [
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories')->with('success', 'Data Berhasil Diubah');
    }
}
