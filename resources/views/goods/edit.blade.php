<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>
<body>
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $k => $error)
                <li>{{ $k }} => {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::open(['url'=>'goods/' . $model->id, 'method'=>'post', 'files'=>true]) }}
<input type="hidden" name="_method" value="put" />
<div>
    <label for="cat_id">商品分类ID</label>
    <input type="text" name="cat_id" id="cat_id" value="{{$model->cat_id}}">
</div>
<div>
    <label for="goods_sn">商品货号</label>
    <input type="text" name="goods_sn" id="goods_sn" value="{{$model->goods_sn}}">
</div>
<div>
    <label for="goods_name">商品名称</label>
    <input type="text" name="goods_name" id="goods_name" value="{{$model->goods_name}}">
</div>
<div>
    <input type="submit" name="提交">
    <a href="{{url('goods')}}">返回</a>
</div>
{{ Form::close() }}
</body>
</html>
