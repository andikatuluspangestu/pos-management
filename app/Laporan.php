<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    // Inisialisasi Tabel
    protected $table        = 'tbl_laporan';

    // Inisialisasi Primary Key
    protected $primaryKey   = 'id_laporan';

    // Inisialisasi nama field yang akan diisi
    protected $fillable = [
        'id_user',
        'id_produk',
        'jumlah',
        'bayar',
        'kembali',
        'nama',
        'alamat',
        'telepon',
        'kode_pembelian'
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
        return self::where('id_laporan', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data);
    }

    // Update Data
    public static function updateData($id, $data)
    {
        return self::where('id_laporan', $id)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return self::where('id_laporan', $id)->delete();
    }

    // Relasi One to Many
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Count Data Laporan
    public static function countLaporansData()
    {
        return self::count();
    }

    // Hitung Data Laporan per-bulan
    public static function countLaporansDataPerMonth()
    {
        return self::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
            ->get();
    }

    // Get Latest Data Laporan
    public static function getLatestLaporans()
    {
        return self::orderBy('created_at', 'desc')->take(5)->get();
    }
}
