<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pizza extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'size_id',
        'price',
        'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function flavors($id)
    {
        $flavors = DB::table('flavor_in_pizzas')->where('pizza_id', $id)->get();

        $query = DB::table('flavors');
        foreach ($flavors as $flavor) {
            $query->orWhere('id', $flavor->id);
        }

        return $query->get();
    }
}
