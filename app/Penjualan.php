<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    // Inisialisasi Tabel
    protected $table = 'tbl_penjualan';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_penjualan';

    // Inisialisasi nama field yang akan diisi
    protected $fillable = [
        'id_user',
        'id_produk',
        'total_item',
        'total_harga',
        'diskon', 
        'status_bayar',
        'diterima',
    ];

    // Inisialisasi field created_at dan updated_at secara otomatis
    public $timestamps = true;

    // Get All Data
    public static function getAll()
    {
        return self::all();
    }

    // Get Data By ID
    public static function getById($id)
    {
        return self::where('id_penjualan', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data);
    }

    // Update Data
    public static function updateData($id, $data)
    {
        return self::where('id_penjualan', $id)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return self::where('id_penjualan', $id)->delete();
    }

    // Relasi One to Many
    public function users()
    {
        return $this->belongsTo('App\Users', 'id');
    }

    // Count Data Penjualan
    public static function countPenjualansData()
    {
        return self::count();
    }

    // Hitung Data Penjualan per-bulan
    public static function countPenjualansDataPerMonth()
    {
        return self::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
        ->get();
    }

    // Get Latest Data Penjualan
    public static function getLatestPenjualans()
    {
        return self::orderBy('created_at', 'desc')->take(5)->get();
    }
}
