<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
  // Menampilkan Data Sales
  public function getSales()
  {
    $sales = User::getAllSales();
    return view('admin.users.sales.list', compact('sales'));
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
  public function delete($id)
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

  // Menampilkan Data Customers
  public function getCustomers()
  {
    $customers = User::getAllCustomers();
    return view('admin.users.customers.list', compact('customers'));
  }
}
