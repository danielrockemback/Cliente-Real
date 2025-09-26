<?php

namespace App\Controller\public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\LocaleSwitcher;


class BaseController extends AbstractController
{
    protected $session;
    public function __construct(private LocaleSwitcher $localeSwitcher) {
        $this->session = New Session();
        $this->localeSwitcher->setLocale($this->session->get('language'));
    }
}
