<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    // Inisialisasi Tabel
    protected $table = 'tbl_categories';

    // Inisialisasi Primary Key
    protected $primaryKey = 'category_id';

    // Inisialisasi nama field yang akan diisi
    protected $fillable = [
        'category_name',
        'category_description',
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
        return self::where('category_id', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        return self::create($data);
    }

    // Update Data
    public static function updateData($id, $data)
    {
        return self::where('category_id', $id)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        return self::where('category_id', $id)->delete();
    }
}
