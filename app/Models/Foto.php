<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Foto.
 *
 * @package namespace PrefCamapua\Models;
 */
class Foto extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['foto','caminho','galeria_id','mimetype','capa'];

    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }


    public function getImagem()
    {
        return asset($this->caminho . $this->foto);
    }

    public function isCapa()
    {
        return $this->capa == '1';
    }
}
