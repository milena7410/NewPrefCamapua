<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UsuarioNivel extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id','nivel'];

    public $table = 'usuario_niveis';

}
