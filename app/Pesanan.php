<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    // Inisialisasi Tabel
    protected $table = 'tbl_pesanan';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_pesanan';

    // Inisialisasi nama field yang akan diisi
    protected $fillable = [
        'id_user',
        'id_produk',
        'harga_jual',
        'jumlah',
        'diskon',
        'subtotal',
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
        return self::where('id_pesanan', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data);
    }

    // Update Data
    public static function updateData($id, $data)
    {
        return self::where('id_pesanan', $id)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return self::where('id_pesanan', $id)->delete();
    }

    // Relasi One to Many
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function pesanan_detail()
    {
        return $this->hasMany(PesaananDetails::class, 'id_pesanan_detail');
    }
}
