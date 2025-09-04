<?php

namespace App\Command;

use App\Entity\Enum\LanguageEnum;
use App\Entity\GeneralData;
use App\Entity\PageSeo;
use App\Repository\GeneralDataRepository;
use App\Repository\PageSeoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-sample-data',
    description: 'Criar dados iniciais para o sistema.',
)]
class CreateSampleDataCommand extends Command
{
    public function __construct(
        private GeneralDataRepository $generalDataRepository,
        private PageSeoRepository $pageSeoRepository,
        private EntityManagerInterface $entityManager,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $generalData = $this->generalDataRepository->find(1);

        if (!$generalData) {
            $io->writeln("<comment>Cadastrando</comment> um novo General Data");

            $generalData = new GeneralData();
            $generalData->setEmail('email@dominio.com.br');
            $generalData->setAddress('Rua X, 123');
            $generalData->setPhone('(61)99999-9999');

            $this->entityManager->persist($generalData);
            $this->entityManager->flush();
        } else {
            $io->writeln("<comment>Já existe um registro na tabela General Data</comment>");
        }


        foreach (LanguageEnum::getOptions() as $language => $value) {
            $pageSeo = $this->pageSeoRepository->findBy(['language' => $value]);

            if (!$pageSeo) {
                $io->writeln("Criando Page SEO em: {$language}");

                $pageSeo = new PageSeo();
                $pageSeo->setHomePageTitle('Home');
                $pageSeo->setHomePageDescription('Home Description');
                $pageSeo->setAboutUsPageTitle('About Us');
                $pageSeo->setAboutUsPageDescription('About Us Description');
                $pageSeo->setFinancingListPageTitle('Financing List');
                $pageSeo->setFinancingListPageDescription('Financing List Description');
                $pageSeo->setNewsListingPageTitle('News List');
                $pageSeo->setNewsListingPageDescription('News List Description');
                $pageSeo->setProductListingPageTitle('Product List');
                $pageSeo->setProductListingPageDescription('Product List Description');
                $pageSeo->setVideoListingPageTitle('Video List');
                $pageSeo->setVideoListingPageDescription('Video List Description');
                $pageSeo->setServiceListingPageTitle('Service List');
                $pageSeo->setServiceListingPageDescription('Service List Description');
                $pageSeo->setLanguage($value);

                $this->entityManager->persist($pageSeo);
            } else {
                $io->writeln("Page SEO em: {$language} <comment>já está cadastrado...</comment>");
            }
        }

        $this->entityManager->flush();

        return Command::SUCCESS;
    }
}
