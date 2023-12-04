<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table ='users';

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Metode untuk mendapatkan level pengguna
    public function getLevelAttribute($value)
    {
        return ucfirst($value);
    }

    // Menampilkan semua data pengguna yang memiliki role sales
    public static function getAllSales()
    {
        return self::where('role', 'sales')->get();
    }

    // Menampilkan semua data pengguna yang memiliki role customer
    public static function getAllCustomers()
    {
        return self::where('role', 'customer')->get();
    }
    
    // Menghitung Jumlah Data Sales
    public static function countSalesData()
    {
        return self::where('role', 'sales')->count();
    }

    // Menghitung Jumlah Data Customer
    public static function countCustomersData()
    {
        return self::where('role', 'customer')->count();
    }
}
