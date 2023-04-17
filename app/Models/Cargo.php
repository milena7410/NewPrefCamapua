<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Cargo.
 *
 * @package namespace CamaraCamapua\Models;
 */
class Cargo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo', 'ativo'];

    public function isAtivo()
    {
        return $this->ativo == '1';
    }
    public function secretario()
    {
        return $this->belongsTo(Secretario::class);
    }

}