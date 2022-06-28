<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductPieChartController extends Controller
{
    function productPieChart(){

        $result=DB::select(DB::raw("SELECT count(*) as total_category, category from products group by category"));
        $productPieChartData="";
        foreach($result as $list)
        {
            $productPieChartData.="['".$list->category."',    ".$list->total_category."],";
        }
        $arr['productPieChartData']=rtrim($productPieChartData,",");
        
        return view('pages.product.productPieChart',$arr);

        // $result=DB::select(DB::raw("SELECT count(*) as total_category, category from products group by category"));
        // dd($result);


    }
    
}
