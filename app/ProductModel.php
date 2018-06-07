<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tblsp';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'MaSp';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['TenSp'];

    
}
