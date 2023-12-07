<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    // Index Page
    /*public function index()
    {
        $data = Categories::getAll();
        return view('admin.categories.list', compact('data'));
    }*/

    public function index(Request $request)
    {
        $data = Categories::getAll();
        $role = $request->user()->role;

        $view = 'admin.categories.list';
        if ($role === 'sales') {
            $view = 'sales.categories.list';
        }

        return view($view, compact('data'));
    }

    // Insert Data
    public function insert(Request $request)
    {
        $data = [
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ];

        Categories::insert($data);
        return redirect()->route('categories')->with('success', 'Data berhasil ditambahkan');
    }

    // Delete Data
    public function delete($id)
    {
        Categories::deleteData($id);
        return redirect()->route('categories')->with('success', 'Data berhasil dihapus');
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $data = [
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ];

        Categories::updateData($id, $data);
        return redirect()->route('categories')->with('success', 'Data berhasil diupdate');
    }

    // Count Data Kategori
    public static function countCategoriesData()
    {
        return Categories::countCategoriesData();
    }
}
