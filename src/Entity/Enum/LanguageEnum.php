<?php

namespace App\Entity\Enum;

enum LanguageEnum: int
{
    case PORTUGUESE = 1;
    case SPANISH = 2;
    case ENGLISH = 3;

    public static function getOptions(): array
    {
        return [
            'Português' =>  self::PORTUGUESE->value,
            'Espanhol' => self::SPANISH->value,
            'Inglês' => self::ENGLISH->value,
        ];
    }

    public static function getDescription(?int $idLanguage): string
    {
        $languagesDescription = [
            self::PORTUGUESE->value => 'Português',
            self::SPANISH->value =>  'Espanhol',
            self::ENGLISH->value =>  'Inglês',
            '' => ''
        ];

        return $languagesDescription[$idLanguage];
    }

    public static function getFlag(?int $idLanguage): string
    {
        $languagesDescription = [
            self::PORTUGUESE->value => '<div class="d-none">pt</div><img src="/assets/images/flags/br.svg" width="20"> Português',
            self::SPANISH->value =>  '<div class="d-none">es</div><img src="/assets/images/flags/es.svg" width="20"> Espanhol',
            self::ENGLISH->value =>  '<div class="d-none">uk</div><img src="/assets/images/flags/uk.svg" width="20"> Inglês',
            '' => ''
        ];

        return $languagesDescription[$idLanguage];
    }

    public static function getAbbreviation(): array
    {
        return [
            'pt' => self::PORTUGUESE->value,
            'es' => self::SPANISH->value,
            'en' => self::ENGLISH->value,
        ];
    }

}
