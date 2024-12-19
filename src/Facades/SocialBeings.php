<?php

namespace TafadzwaLawrence\SocialBeings\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tafadzwa Lawrence\SocialBeings\SocialBeings
 */
class SocialBeings extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TafadzwaLawrence\SocialBeings\SocialBeings::class;
    }
}