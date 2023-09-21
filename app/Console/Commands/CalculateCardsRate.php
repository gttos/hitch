<?php

namespace App\Console\Commands;

use App\Models\Card;
use Illuminate\Console\Command;

class CalculateCardsRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate:cards-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recalculate rate of each card.';

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
