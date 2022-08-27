<?php

namespace PrefCamapua\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNavigation(){
        view()->composer('elements._menu', 'PrefCamapua\Http\Composers\SecretariaComposer');
        view()->composer('elements._maisNoticias', 'PrefCamapua\Http\Composers\NoticiaComposer');
        view()->composer('elements._destaques', 'PrefCamapua\Http\Composers\NoticiaDestaqueComposer');
        view()->composer('elements._portalTransparencia', 'PrefCamapua\Http\Composers\LinkPortalComposer');
        view()->composer('elements._linksUteis', 'PrefCamapua\Http\Composers\LinkUtilComposer');
        view()->composer('elements._ultimasPublicacoes', 'PrefCamapua\Http\Composers\PublicacaoComposer');
        view()->composer('elements._galeriaIndex', 'PrefCamapua\Http\Composers\GaleriaComposer');
        view()->composer('elements.footer', 'PrefCamapua\Http\Composers\EntidadeComposer');
        view()->composer('contato', 'PrefCamapua\Http\Composers\EntidadeComposer');
        view()->composer('elements.header', 'PrefCamapua\Http\Composers\EntidadeComposer');
        view()->composer('elements._menu', 'PrefCamapua\Http\Composers\MenuComposer');
        view()->composer('elements._publicacao_sociedade_civil', 'PrefCamapua\Http\Composers\PublicacaoSocidadeCivilComposer');
        view()->composer('template.template', 'PrefCamapua\Http\Composers\HeaderComposer');
        view()->composer('index', 'PrefCamapua\Http\Composers\BannerComposer');
    }
}
