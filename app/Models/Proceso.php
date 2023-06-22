<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'proceso';

    protected $fillable = ['PRO_PREFIJO','PRO_NOMBRE'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentos()
    {
        return $this->hasMany('App\Models\Documento', 'DOC_ID_PROCESO', 'id');
    }

}
