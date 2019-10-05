<?php

namespace App\models\stock;

use Illuminate\Database\Eloquent\Model;

class StockHistory extends Model
{
    public $timestamps = false;
    protected $table = "ecp_stock_history";
}