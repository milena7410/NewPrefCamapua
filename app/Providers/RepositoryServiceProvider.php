<?php

namespace PrefCamapua\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\PrefCamapua\Repositories\UserRepository::class, \PrefCamapua\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\UsuarioNivelRepository::class, \PrefCamapua\Repositories\UsuarioNivelRepository::class);
        $this->app->bind(\PrefCamapua\Repositories\NoticiaRepository::class, \PrefCamapua\Repositories\NoticiaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\SecretariaRepository::class, \PrefCamapua\Repositories\SecretariaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\ProjetoRepository::class, \PrefCamapua\Repositories\ProjetoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\ServicoRepository::class, \PrefCamapua\Repositories\ServicoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\CategoriaRepository::class, \PrefCamapua\Repositories\CategoriaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\MidiaRepository::class, \PrefCamapua\Repositories\MidiaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\GaleriaRepository::class, \PrefCamapua\Repositories\GaleriaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\PublicacaoRepository::class, \PrefCamapua\Repositories\PublicacaoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\InformativoRepository::class, \PrefCamapua\Repositories\InformativoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\LinkRepository::class, \PrefCamapua\Repositories\LinkRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\NoticiaTagRepository::class, \PrefCamapua\Repositories\NoticiaTagRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\TagRepository::class, \PrefCamapua\Repositories\TagRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\SecretarioRepository::class, \PrefCamapua\Repositories\SecretarioRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\CargoRepository::class, \PrefCamapua\Repositories\CargoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\NoticiaSecretariaRepository::class, \PrefCamapua\Repositories\NoticiaSecretariaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\LinkSecretariaRepository::class, \PrefCamapua\Repositories\LinkSecretariaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\ArquivoRepository::class, \PrefCamapua\Repositories\ArquivoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\FotoRepository::class, \PrefCamapua\Repositories\FotoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\PaginaRepository::class, \PrefCamapua\Repositories\PaginaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\EntidadeRepository::class, \PrefCamapua\Repositories\EntidadeRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\MidiaRepository::class, \PrefCamapua\Repositories\MidiaRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\TipoPublicacaoRepository::class, \PrefCamapua\Repositories\TipoPublicacaoRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\SiteRepository::class, \PrefCamapua\Repositories\SiteRepositoryEloquent::class);
        $this->app->bind(\PrefCamapua\Repositories\BannerRepository::class, \PrefCamapua\Repositories\BannerRepositoryEloquent::class);
    }
}
