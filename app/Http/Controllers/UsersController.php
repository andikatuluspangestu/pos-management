<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  // Menampilkan Data Sales
  /*public function getSales()
  {
    $sales = User::getAllSales();
    return view('admin.users.sales.list', compact('sales'));
  }*/
  public function getSales(Request $request)
  {
    $sales = User::getAllSales();
    $role = $request->user()->role;

    switch ($role) {
      case 'admin':
        return view('admin.users.sales.list', compact('sales'));
      case 'sales':
        return view('sales.users.sales.list', compact('sales'));
      case 'customer':
        return view('customer.users.sales.list', compact('sales'));
      default:
        return abort(403, 'You are not authorized to view this page.');
    }
  }

  // Menampilkan Form Insert Sales
  public function insertSalesForm()
  {
    return view('admin.users.sales.add');
  }

  // Insert Data Sales
  public function insertSales(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
    ]);

    $sales = new User;
    $sales->name = $request->name;
    $sales->email = $request->email;
    $sales->password = bcrypt($request->password);
    $sales->role = 'sales';
    $sales->save();

    // Message
    if ($sales) {
      // Redirect dengan pesan sukses
      return redirect()->route('sales')->with(['success' => 'Data Berhasil Disimpan!']);
    } else {
      // Redirect dengan pesan error
      return redirect()->route('sales')->with(['error' => 'Data Gagal Disimpan!']);
    }
  }

  // Delete Data Sales
  public function deleteSales($id)
  {
    $sales = User::find($id);
    $sales->delete();

    // Message
    if ($sales) {
      // Redirect dengan pesan sukses
      return redirect()->route('sales')->with(['message' => 'Data Berhasil Dihapus!']);
    } else {
      // Redirect dengan pesan error
      return redirect()->route('sales')->with(['message' => 'Data Gagal Dihapus!']);
    }
  }

  // Update Data Sales
  public function updateSales(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required|min:3',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'nullable|min:6',
    ]);

    $sales = User::find($id);
    $sales->name = $request->name;
    $sales->email = $request->email;
    if (!empty($request->password)) {
      $sales->password = bcrypt($request->password);
    }
    $sales->update();

    // Message
    if ($sales) {
      // Redirect dengan pesan sukses
      return redirect()->route('sales')->with(['message' => 'Data Berhasil Diupdate!']);
    } else {
      // Redirect dengan pesan error
      return redirect()->route('sales')->with(['message' => 'Data Gagal Diupdate!']);
    }
  }

  // Menghitung Jumlah Data Sales
  public static function countSalesData()
  {
    return User::where('role', 'sales')->count();
  }

  // Menampilkan Data Customers
  public function getCustomers()
  {
    $customers = User::getAllCustomers();
    return view('admin.users.customers.list', compact('customers'));
  }

  // Menghitung Jumlah Data Customers
  public static function countCustomersData()
  {
    return User::where('role', 'customer')->count();
  }
}
