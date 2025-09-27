<?php

namespace App\Controller\public;

use App\Entity\Enum\LanguageEnum;
use App\Repository\BannerRepository;
use App\Repository\FinancingRepository;
use App\Repository\NewsRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\TestimonyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


final class HomeController extends BaseController
{
    #[Route('/', name: 'app_home')]
    public function index(
        BannerRepository $bannerRepository,
        ProductCategoryRepository $productCategoryRepository,
        NewsRepository $newsRepository,
        TestimonyRepository $testimonyRepository,
        FinancingRepository $financingRepository,
    ): Response
    {
        $languageId = $this->getLanguageId();

        $banners = $bannerRepository->findBy(['language' => $languageId, 'active' => 1], ['position' => 'ASC']);
        $productCategories = $productCategoryRepository->findBy(['language' => $languageId]);
        $news = $newsRepository->findBy(['language' => $languageId, 'status' => 1, 'highlighted' => 1], ['date' => 'DESC']);
        $testimonies = $testimonyRepository->findBy(['language' => $languageId, 'status' => 1, 'highlighted' => 1], ['position' => 'ASC']);
        $financings = $financingRepository->findBy(['language' => $languageId, 'status' => 1, 'highlighted' => 1], ['position' => 'ASC']);

        return $this->render('public/home/index.html.twig', [
            'controller_name' => 'HomeController',
            'banners' => $banners,
            'productCategories' => $productCategories,
            'news' => $news,
            'testimonies' => $testimonies,
            'financings' => $financings,
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }

    #[Route('/noticias', name: 'app_news', methods: ['GET'])]
    public function news(NewsRepository $newsRepository): Response
    {
        $languageId = $this->getLanguageId();

        $news = $newsRepository->findBy(['language' => $languageId, 'status' => 1, 'highlighted' => 1], ['date' => 'DESC']);

        return $this->render('public/news/news.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'news' => $news
        ]);
    }

    #[Route('/noticias/{slug}', name: 'app_new_detail', methods: ['GET'])]
    public function new($slug): Response
    {
        return $this->render('public/news/news-detail.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }

    #[Route('/produtos', name: 'app_products', methods: ['GET'])]
    public function products(ProductRepository $productRepository): Response
    {
        $languageId = $this->getLanguageId();
        $products = $productRepository->findBy(['status' => 1, 'language' => $languageId]);

        return $this->render('public/product/products.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'products' => $products
        ]);
    }

    #[Route('/produto/{slug}', name: 'app_product_detail', methods: ['GET'])]
    public function product($slug, ProductRepository $productRepository): Response
    {

        $product = $productRepository->findOneBy(['slug' => $slug]);

        return $this->render('public/product/product-detail.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'product' => $product
        ]);
    }

    #[Route('/quem-somos', name: 'app_who_we_are', methods: ['GET'])]
    public function whoWeAre(): Response
    {
        return $this->render('public/whoWeAre/who-we-are.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }

    #[Route('/financeamentos', name: 'app_financing', methods: ['GET'])]
    public function financing(): Response
    {
        return $this->render('public/financing/financing.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }
}
