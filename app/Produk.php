<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Inisialisasi Tabel
    protected $table = 'tbl_products';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_produk';

    // Inisialisasi nama field yang akan diisi
    protected $fillable = [
        'category_id',
        'kode_produk',
        'produk_description',
        'nama_produk',
        'gambar',
        'diskon',
        'harga_jual',
        'stok',        
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
        return self::where('id_produk', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data);
    }

    // Update Data
    public static function updateData($id, $data)
    {
        return self::where('id_produk', $id)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return self::where('id_produk', $id)->delete();
    }

    // Relasi One to Many
    public function tbl_categories()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }

    // Relasi One to Many
    public function pesanandetails()
    {
        return $this->hasMany('App\PesananDetails', 'id_pesanan_detail');
    }

    // Count Data Produk
    public static function countProductsData()
    {
        return self::count();
    }

    // Hitung Data Produk per-bulan
    public static function countProductsDataPerMonth()
    {
        return self::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
        ->get();
    }

    // Get Latest Data Produk
    public static function getLatestProducts()
    {
        return self::orderBy('created_at', 'desc')->take(5)->get();
    }
}
