<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\service\stock\StockService;


//php artisan stock:get
class getStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get stock data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(StockService $service)
    {
        $service->getStockInfo();
    }

    /**
     * execute the console command
     */




}
