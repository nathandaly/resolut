<?php

namespace App\Controller;

use App\Repository\BannerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomePageController extends Controller
{
    /**
     * @var BannerRepository
     */
    private $bannerRepository;

    /**
     * HomePageController constructor.
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * @Route("/", name="home_page.index")
     */
    public function index()
    {
        $banners = $this->bannerRepository->findAllBannersBySortIdAsc();

        return $this->render('home_page/index.html.twig', [
            'banners' => $banners,
        ]);
    }
}
