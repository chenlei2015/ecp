<?php
/**
 * Created by PhpStorm.
 * User: Yibai
 * Date: 2019/9/23
 * Time: 20:18
 */

namespace App\Admin\Controllers;

use Illuminate\Support\Facades\DB;
use App\models\stock\Stock;
use App\models\stock\StockHistory;
use DenDroGram\Controller\DenDroGram;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Admin;
use DenDroGram\Controller\AdjacencyList;
use Encore\Admin\Layout\Content;
use App\service\stock\StockService;

class StockController extends AdminController
{

    protected  $url = "http://hq.sinajs.cn/list=";
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stock);
        //条件查询
        $grid->model()->where('id','>=',2);
        //表格展示的字段
        $grid->column('id', '编号')->sortable();
        $grid->column('stock_code','代码');
        $grid->column('stock_name','名称');
        $grid->column('today_start_price','今日开盘价');
        $grid->column('yesterday_end_price','昨日收盘价');
        $grid->column('current_price','当前价格');
        $grid->column('today_max_price','今日最高价');
        $grid->column('today_min_price','今日最低价');
        $grid->column('create_at','创建时间');
        //表格条件筛选
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 设置create_time字段的范围查询
            $filter->between('create_at', '创建时间')->datetime();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Stock::findOrFail($id));
        return $show;
    }

    public function test()
    {
        $stock_code = "sh513050";
        DB::beginTransaction();
        try {
            if(date('Hi') < 1500) throw new \Exception('时间不合理');
            $stock = Stock::where('stock_code', $stock_code)->first();
            if(!$stock){
                $stock = new Stock();
            }
            $content = $this->stock_query($stock_code);
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

    public function  stock_query($stock_code){
        $url = $this->url.$stock_code;
        $ch = curl_init();
        curl_setopt_array($ch,[
            CURLOPT_URL =>$url,    //请求的url
            CURLOPT_RETURNTRANSFER =>1,  //不要把请求的结果直接输出到屏幕上
            CURLOPT_CUSTOMREQUEST=>'GET',
            CURLOPT_TIMEOUT =>30,        //请求超时设置
            CURLOPT_SSL_VERIFYPEER=>0,   //服务端不验证ssl证书
            CURLOPT_SSL_VERIFYHOST=>0,   //服务端不验证ssl证书
            CURLOPT_HTTPPROXYTUNNEL=>1,  //启用时会通过HTTP代理来传输
            //CURLOPT_HTTPHEADER =>['Content-type:text/html;charset=utf-8'],//请求头部设置
        ]);
        $content = curl_exec($ch);  //执行
        $err = curl_error($ch);
        curl_close($ch);
        if($err) throw  new \Exception('获取失败');
        $result = explode('=',$content);
        return explode(',',trim($result[1],',;"'));
    }

}