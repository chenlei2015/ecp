<?php
namespace App\service\stock;
use App\service\Service;
use Illuminate\Support\Facades\DB;
use App\models\stock\Stock;
use App\models\stock\StockCode;
use App\models\stock\StockHistory;
class StockService extends Service{

    protected  $url = "http://hq.sinajs.cn/list=";

    public function getStockData($stock_code)
    {
        DB::beginTransaction();
        try {
            if(date('Hi') < 1500) throw new \Exception('时间不合理');
            $stock = Stock::where('stock_code', $stock_code)->first();
            if(!$stock){
                $stock = new Stock();
            }
            $url = $this->url.$stock_code;
            $content = $this->curl_get($url);
            var_dump($content);die;
            $stock->stock_code = $stock_code;
            $stock->stock_name = 'jhggshh';
            $stock->today_start_price = $content[1];
            $stock->yesterday_end_price = $content[2];
            $stock->current_price = $content[3];
            $stock->today_max_price = $content[4];
            $stock->today_min_price = $content[5];
            $stock->create_at = $content[30].' '.$content[31];
            $stock->update_at = $content[30].' '.$content[31];
            if(!$stock->save()) throw new \Exception('保存失败');
            $history = StockHistory::where('stock_code', $stock_code)->where('create_at','>=',date("Y-m-d").' 15:00:00')->first();
            if($history) throw new \Exception('已获取该记录');
            $history = new StockHistory();
            $history->stock_code = $stock_code;
            $history->stock_name = 'jhggshh';
            $history->today_start_price = $content[1];
            $history->yesterday_end_price = $content[2];
            $history->current_price = $content[3];
            $history->today_max_price = $content[4];
            $history->today_min_price = $content[5];
            $history->create_at = $content[30].' '.$content[31];
            $history->update_at = $content[30].' '.$content[31];
            if(!$history->save()) throw new \Exception('保存失败');
            DB::commit();
            return ['status'=>1,'errorMsg'=>'获取成功'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['status'=>0,'errorMsg'=>$e->getMessage()];
        }
    }

    public function getStockInfo(){
        $codes = StockCode::where('is_del',0)->get();
        if(!empty($codes)){
            foreach ($codes as $code){
                $this->getStockData($code->stock_code);
            }
        }else{
            echo '没有数据';
        }
    }

}