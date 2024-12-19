<?php

namespace TafadzwaLawrence\SocialBeings;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TafadzwaLawrence\SocialBeings\Commands\SocialBeingsCommand;

class SocialBeingsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('socialbeings')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations([
                '2024_12_17_075049_create_follows_table',
                '2024_12_17_075529_create_likes_table',
                '2024_12_17_075543_create_favourites_table',
                '2024_12_17_075602_create_subscriptions_table',
                '2024_12_17_075648_create_friends_table',
            ])
            ->runsMigrations()
            ->hasCommand(SocialBeingsCommand::class);
    }
}
