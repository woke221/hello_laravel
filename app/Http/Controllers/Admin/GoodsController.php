<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function index()
    {
        $goods_list = Goods::paginate(1);
        $title = "商品列表";

        return view('goods.index', compact('goods_list', 'title'));
    }

    public function create(){
        $title = '添加商品';

        return view('goods.create', compact('title'));
    }
}
