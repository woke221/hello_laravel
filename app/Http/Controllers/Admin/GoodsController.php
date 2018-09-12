<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goods;
use App\Rules\GoodsSnRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GoodsController extends Controller
{
    protected $rules;
    protected $messages;

    public function __construct()
    {
        // 表单数据验证
        $this->rules = [
            'goods_sn' => ['required', new GoodsSnRule()],
            'goods_name' => 'required',
            'cat_id' => 'required',
        ];
        $this->messages = [
            'goods_sn.required' => '商品货号不能为空',
            'goods_name.required' => '商品名称不能为空',
            'cat_id.required' => '分类ID不能为空',
        ];
    }

    public function index()
    {
        $goods_list = Goods::paginate(1);
        $title = "商品列表";

        return view('goods.index', compact('goods_list', 'title'));
    }

    public function create()
    {
        $title = '添加商品';

        return view('goods.create', compact('title'));
    }

    public function store()
    {
        /*
        $validator = Validator::make(request()->all(), $this->rules, $this->messages);
        if($validator->fails()){
            return view('goods.create')
                ->with('title', '表单验证失败')
                ->with('errors', $validator->messages());
        }
        */
        request()->validate($this->rules, $this->messages);

        // 处理商品数据
        Goods::createModel();

        return redirect('goods');
    }

    public function edit($id)
    {
        $model = Goods::find($id);
        if(!$model)
        {
            return '模型不存在';
        }

        $title = '编辑商品数据';

        return view('goods.edit', compact('title', 'model'));
    }

    public function update($id)
    {
        $model = Goods::find($id);
        if(!$model)
        {
            return '模型不存在';
        }
        // 表单验证
        request()->validate($this->rules, $this->messages);

        // 更新数据
        $model->update(request()->all());
    }

    public function delete($id)
    {
        $model = Goods::find($id);
        if(!$model)
        {
            return '模型不存在';
        }

        $model->delete();

        return redirect('goods');
    }

    /* ajax
    public function destroy($id)
    {
        $model = Goods::find($id);
        if(!$model)
        {
            return '模型不存在';
        }

        $model->delete();

        return json_encode([
            // ...
        ]);
    }
    */
}
