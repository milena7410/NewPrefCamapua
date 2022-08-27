<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Publicacao.
 *
 * @package namespace PrefCamapua\Models;
 */
class Publicacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'publicacoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','numero','ano','descricao','ativo','tipo_publicacao_id','url'];

    public function tipoPublicacao()
    {
        return $this->belongsTo(TipoPublicacao::class,'tipo_publicacao_id');
    }

    public function isAtivo()
    {
        return $this->ativo == '1'? true : false;
    }

    public function getNumAnoPublicacao()
    {
        return $this->numero.'/'.$this->ano;
    }

    public function arquivos()
    {
        return $this->hasMany(Arquivo::class,'publicacao_id','id');
    }

    public function getArquivosAtivos(){
        return $this->arquivos()->where('ativo','1');
    }

    /**
     * @param string $url
     */
    public function setUrlAttribute($url)
    {
        $this->attributes['url'] = str_slug($url);
    }
}
