<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesaananDetails extends Model
{
    // Inisialisasi Tabel
    protected $table = 'tbl_pesanan_detail';

    // Inisialisasi Primary Key
    protected $primaryKey = 'id_pesanan_detail';

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
        'kodepembelian',
        'status'
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
        return self::where('id_pesanan_detail', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data);
    }

    // Update Data
    public static function updateData($id, $data)
    {
        return self::where('id_pesanan_detail', $id)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return self::where('id_pesanan_detail', $id)->delete();
    }

    // Relasi One to Many
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
}
