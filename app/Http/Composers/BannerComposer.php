<?php

namespace PrefCamapua\Http\Composers;

use PrefCamapua\Repositories\BannerRepository;
use Illuminate\Contracts\View\View;

class BannerComposer
{
    /** @var  BannerRepository\ */
    private $bannerRepository;

    /**
     * BannerComposer constructor.
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $banners = $this->bannerRepository->findWhere(['ativo' => 1]);
        $view->with('banners', $banners);
    }
}
