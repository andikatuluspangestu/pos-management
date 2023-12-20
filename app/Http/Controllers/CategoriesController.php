<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{

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
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.categories')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('sales.categories')->with('success', 'Data berhasil ditambahkan');
        }
    }

    // Delete Data
    public function delete($id)
    {
        Categories::deleteData($id);
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.categories')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('sales.categories')->with('success', 'Data berhasil dihapus');
        }
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $data = [
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
        ];

        Categories::updateData($id, $data);
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.categories')->with('success', 'Data berhasil diubah');
        } else {
            return redirect()->route('sales.categories')->with('success', 'Data berhasil diubah');
        }
    }

    // Count Data Kategori
    public static function countCategoriesData()
    {
        return Categories::countCategoriesData();
    }
}
