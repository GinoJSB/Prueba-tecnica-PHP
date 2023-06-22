<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'documentos';

    protected $fillable = ['DOC_NOMBRE','DOC_CODIGO','DOC_CONTENIDO','DOC_ID_TIPO','DOC_ID_PROCESO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function proceso()
    {
        return $this->hasOne('App\Models\Proceso', 'id', 'DOC_ID_PROCESO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipo()
    {
        return $this->hasOne('App\Models\Tipo', 'id', 'DOC_ID_TIPO');
    }

}
