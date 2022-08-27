<?php

namespace PrefCamapua\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Noticia.
 *
 * @package namespace PrefCamapua\Models;
 */
class Noticia extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'titulo',
        'descricao',
        'conteudo',
        'url',
        'galeria_id',
        'imagem',
        'caminho_imagem',
        'hora_publicacao',
        'data_publicacao',
        'categoria_id',
        'ativo',
        'destaque'
    ];

    protected $dates = ['data_publicacao'];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function secretarias()
    {
        return $this->belongsToMany(Secretaria::class);
    }

    public function getImagem()
    {
        return asset($this->caminho_imagem . $this->imagem);
    }

    public function isDestaque()
    {
        return $this->destaque == '1' ? true : false;
    }

    public function isAtivo()
    {
        return $this->ativo == '1' ? true : false;
    }

    /**
     * @param string $url
     */
    public function setUrlAttribute($url)
    {
        $this->attributes['url'] = str_slug($url);
    }

    /**
     * @return string
     */
    public function getTagsAttribute()
    {
        $tag = $this->tags()->pluck('tag')->all();
        $tags = implode(',', $tag);

        return $tags;
    }

    /**
     * @return mixed
     */
    public function getDataPublicacaoAttribute()
    {
        $dataPublicacao = $this->attributes['data_publicacao'];
        $dataPublicacao = Carbon::createFromFormat('Y-m-d', $dataPublicacao);

        return $dataPublicacao->format('d/m/Y');
    }

    /**
     * @param string $dataPublicacao
     */
    public function setDataPublicacaoAttribute($dataPublicacao)
    {
        $dataPublicacao = Carbon::createFromFormat('d/m/Y', $dataPublicacao);
        $this->attributes['data_publicacao'] = $dataPublicacao->format('Y-m-d');
    }


}
