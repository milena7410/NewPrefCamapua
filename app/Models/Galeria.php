<?php

namespace PrefCamapua\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Galeria.
 *
 * @package namespace PrefCamapua\Models;
 */
class Galeria extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descricao', 'ativo', 'data_galeria'];

    protected $dates = ['data_galeria'];

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function getFotoCapa()
    {
        $fotos = $this->fotos();
        if($fotos->count() == 0){
            return asset('img/no-image.png');
        }

        $capa = $fotos->where('capa', '1')->first();

        return asset($capa->caminho . $capa->foto);
    }

    public function secretarias()
    {
        return $this->belongsToMany(Secretaria::class);
    }

    public function isAtivo()
    {
        return $this->ativo == '1' ? true : false;
    }

    /**
     * @return mixed
     */
    public function getDataGaleriaAttribute()
    {
        $dataGaleria = $this->attributes['data_galeria'];
        $dataGaleria = Carbon::createFromFormat('Y-m-d', $dataGaleria);

        return $dataGaleria->format('d/m/Y');
    }

    /**
     * @param string $dataGaleria
     */
    public function setDataGaleriaAttribute($dataGaleria)
    {
        $dataGaleria = Carbon::createFromFormat('d/m/Y', $dataGaleria);
        $this->attributes['data_galeria'] = $dataGaleria->format('Y-m-d');
    }


}
