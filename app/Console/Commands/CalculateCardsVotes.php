<?php

namespace App\Console\Commands;

use App\Models\Card;
use Illuminate\Console\Command;

class CalculateCardsVotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:cards-votes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalculate votes of each card.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Card::countVotes();
        return Command::SUCCESS;
    }
}
