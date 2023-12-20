<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

  // Menampilkan Data Sales
  public function getSales(Request $request)
  {
    $sales  = User::getAllSales();
    $role   = $request->user()->role;

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
      'name'      => 'required|min:3',
      'email'     => 'required|email|unique:users',
      'password'  => 'required|min:6',
    ]);

    $sales              = new User;
    $sales->name        = $request->name;
    $sales->email       = $request->email;
    $sales->password    = bcrypt($request->password);
    $sales->role        = 'sales';
    $sales->phone       = $request->phone;
    $sales->address     = $request->address;
    $sales->city        = $request->city;
    $sales->postal_code = $request->postal_code;
    $sales->save();

    // Message
    if ($sales) {
      return redirect()->route('sales')->with(['message' => 'Data Berhasil Disimpan!']);
    } else {
      return redirect()->route('sales')->with(['message' => 'Data Gagal Disimpan!']);
    }
  }

  // Delete Data Sales
  public function deleteSales($id)
  {
    $sales = User::find($id);
    $sales->delete();

    if ($sales) {
      return redirect()->route('sales')->with(['message' => 'Data Berhasil Dihapus!']);
    } else {
      return redirect()->route('sales')->with(['message' => 'Data Gagal Dihapus!']);
    }
  }

  // Update Data Sales
  public function updateSales(Request $request, $id)
  {
    $this->validate($request, [
      'name'      => 'required|min:3',
      'email'     => 'required|email|unique:users,email,' . $id,
      'password'  => 'nullable|min:6',
    ]);

    $sales              = User::find($id);
    $sales->name        = $request->name;
    $sales->email       = $request->email;
    $sales->role        = 'sales';
    $sales->phone       = $request->phone;
    $sales->address     = $request->address;
    $sales->city        = $request->city;
    $sales->postal_code = $request->postal_code;

    if (!empty($request->password)) {
      $sales->password = bcrypt($request->password);
    }

    $sales->update();

    if ($sales) {
      return redirect()->route('sales')->with(['message' => 'Data Berhasil Diupdate!']);
    } else {
      return redirect()->route('sales')->with(['message' => 'Data Gagal Diupdate!']);
    }
  }

  // Menghitung Jumlah Data Sales
  public static function countSalesData()
  {
    return User::where('role', 'sales')->count();
  }

  // Menampilkan Data Customers
  public function getCustomers(Request $request)
  {
    $customers  = User::getAllCustomers();
    $role       = $request->user()->role;

    switch ($role) {
      case 'admin':
        return view('admin.users.customers.list', compact('customers'));
      case 'sales':
        return view('sales.users.customers.list', compact('customers'));
      case 'customer':
        return view('customers.users.customers.list', compact('customers'));
      default:
        return abort(403, 'You are not authorized to view this page.');
    }
  }

  // Menghitung Jumlah Data Customers
  public static function countCustomersData()
  {
    return User::where('role', 'customer')->count();
  }
}
