<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Banner.
 *
 * @package namespace PrefCamapua\Models;
 */
class Banner extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['banner','link', 'caminho', 'mimetype', 'user_id','ativo'];

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function getBannerPath(){
        return asset($this->caminho.$this->banner);
    }

    public function getPathImage(){
        return $this->caminho.$this->banner;
    }

}
