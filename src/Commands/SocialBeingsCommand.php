<?php

namespace TafadzwaLawrence\SocialBeings\Commands;

use Illuminate\Console\Command;

class SocialBeingsCommand extends Command
{
    public $signature = 'socialbeings';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}