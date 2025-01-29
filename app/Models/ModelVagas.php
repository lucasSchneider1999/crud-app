<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelVagas extends Model
{
    protected $table='vagas';
    protected $fillable = ['Titulo', 'Cargo', 'Salario', 'Salario_visivel', 'Descricao'];
}
