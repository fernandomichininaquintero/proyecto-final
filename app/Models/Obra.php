<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;
use App\Models\Provincia;

class Obra extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'obra';
    public $timestamps = false;

    public function getMunicipioName()
    {
        $municipio = Municipio::findOrFail($this->municipio_id);

        return $municipio->nombre;
    }

    public function getProvinciaName()
    {
        $municipio = Municipio::findOrFail($this->municipio_id);

        $provincia = Provincia::findOrFail($municipio->provincia_id);

        return $provincia->nombre;
    }
}
