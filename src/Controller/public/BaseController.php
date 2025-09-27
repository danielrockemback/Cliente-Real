<?php

namespace App\Controller\public;


use App\Entity\Enum\LanguageEnum;
use App\Repository\ContactFormUrlPostRepository;
use App\Repository\GeneralDataRepository;
use App\Repository\GlobalTagsRepository;
use App\Repository\PageSeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\LocaleSwitcher;


class BaseController extends AbstractController
{
    protected $session;

    protected $pageSeo;

    protected $pageId;

    public $generalData;

    public $globalTags;

    public $urlToPostForm;

    public function __construct(
        private LocaleSwitcher $localeSwitcher,
        private PageSeoRepository $pageSeoRepository,
        private GeneralDataRepository $generalDataRepository,
        private GlobalTagsRepository $globalTagsRepository,
        private ContactFormUrlPostRepository $contactFormUrlPostRepository,
    ) {

        $this->session = New Session();

        if (!$this->session->has('language')) {
            $this->session->set('language', 'pt');
        }

        $this->localeSwitcher->setLocale($this->session->get('language'));

        $languageId = $this->getLanguageId();

        $this->pageSeo = $this->pageSeoRepository->findOneBy(['language' => $languageId]);

        $allGeneralData = $generalDataRepository->findAll();
        $this->generalData = end($allGeneralData);

        $allGlobalTags = $globalTagsRepository->findAll();
        $this->globalTags = end($allGlobalTags);

        $allContact = $contactFormUrlPostRepository->findAll();
        $this->urlToPostForm = end($allContact);

    }

    protected function getLanguageId(): int
    {
        $abbreviation = $this->session->get('language');

        return LanguageEnum::getValueAbbreviation($abbreviation);
    }
}
