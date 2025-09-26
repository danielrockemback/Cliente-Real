<?php

namespace App\Controller\public;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Enum\LanguageEnum;
class LanguageController extends BaseController
{
    #[Route('/language/{language}', name: 'app_language')]
    public function index($language): Response
    {
        $this->session->set('language', 'pt');

        foreach (LanguageEnum::getAbbreviation() as $abbreviation => $value) {
            if ($language === $abbreviation) {
                $this->session->set('language', $language);
                break;
            }
        }

        return $this->redirectToRoute('app_home');
    }
}
