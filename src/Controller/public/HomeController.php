<?php

namespace App\Controller\public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Translation\LocaleSwitcher;
use Symfony\Contracts\Translation\TranslatorInterface;

final class HomeController extends BaseController
{
    #[Route('/', name: 'app_home')]
    public function index(TranslatorInterface $translator): Response
    {
        return $this->render('public/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/noticias', name: 'app_news', methods: ['GET'])]
    public function news(): Response
    {
        return $this->render('public/news/news.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/noticias/{slug}', name: 'app_new_detail', methods: ['GET'])]
    public function new($slug): Response
    {
        return $this->render('public/news/news-detail.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/produtos', name: 'app_products', methods: ['GET'])]
    public function products(): Response
    {
        return $this->render('public/product/products.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/produto/{slug}', name: 'app_product_detail', methods: ['GET'])]
    public function product($slug): Response
    {
        return $this->render('public/product/product-detail.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/quem-somos', name: 'app_who_we_are', methods: ['GET'])]
    public function whoWeAre(): Response
    {
        return $this->render('public/whoWeAre/who-we-are.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/financeamentos', name: 'app_financing', methods: ['GET'])]
    public function financing(): Response
    {
        return $this->render('public/financing/financing.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
