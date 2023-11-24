<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The Categories model represents the 'categories' table in the database.
     *
     * @var string
     */
    protected $table = 'tbl_categories';

    /**
     * The Categories model represents a category in the POS system.
     * 
     * @var array $fillable The attributes that are mass assignable.
     */
    protected $fillable = [
        'category_name',
    ];

    /**
     * Retrieve all categories from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAll()
    {
        return Categories::all();
    }

    /**
     * Retrieve a category by its ID.
     *
     * @param int $id The ID of the category to retrieve.
     * @return Categories|null The category with the given ID, or null if it does not exist.
     */
    public static function getById($id)
    {
        return Categories::where('category_id', $id)->first();
    }

    /**
     * Insert a new category record into the database.
     *
     * @param array $data The data to be inserted.
     * @return \Illuminate\Database\Eloquent\Model The newly created category model instance.
     */
    public static function insert($data)
    {
        return Categories::create($data);
    }

    /**
     * Update the data of a category.
     *
     * @param int $category_id The ID of the category to update.
     * @param array $data The data to update.
     * @return bool True if the update was successful, false otherwise.
     */
    public static function updateData($category_id, $data)
    {
        return Categories::where('category_id', $category_id)->update($data);
    }

    /**
     * Deletes a category from the database based on its ID.
     *
     * @param int $id The ID of the category to be deleted.
     * @return bool True if the category was successfully deleted, false otherwise.
     */
    public static function deleteData($id)
    {
        return Categories::where('category_id', $id)->delete();
    }
}
