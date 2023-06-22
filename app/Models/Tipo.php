<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'tipo';

    protected $fillable = ['TIP_NOMBRE','TIP_PREFIJO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentos()
    {
        return $this->hasMany('App\Models\Documento', 'DOC_ID_TIPO', 'id');
    }

}
