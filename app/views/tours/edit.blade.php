@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-12">
        <h1>旅游路线编辑</h1>
        <hr />
        <h2>修改路线信息 - {{ $tour->title }}</h2><hr>

        @if($errors->has())
        <div class="text-danger">
            <p>请修复以下错误后重新提交：</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><!-- end bg-danger -->
        @endif

		{{ Form::open(array('url'=>'admin/tours/update', 'role'=>'form', 'files'=>true)) }}
        <div class="form-group">
            {{ Form::label('title', '路线名称') }}
            {{ Form::text('title', $tour->title, array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('description', '详细介绍') }}
            {{ Form::textarea('description', $tour->description, array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('thumbnail', '上传首页图片（为达到最好效果，请先调整图片大小至800x450像素）') }}
            {{ Form::file('thumbnail') }}
            <p class="help-block">如果继续使用原图片，无需上传图片。</p>
        </div>
		{{ Form::hidden('id', $tour->id) }}
		{{ Form::submit('修改', array('class'=>'btn btn-primary')) }}
		{{ Form::close() }}

        <h2>价格信息</h2><hr>
        <ul>
            @foreach($prices as $price)
                <li>
                    {{ $price->number_of_people }}人 - ${{ $price->price }}
                    {{ Form::open(array('url'=>'admin/prices/destroy', 'class'=>'form-inline')) }}
                    {{ Form::hidden('id', $price->id) }}
                    {{ Form::submit('删除', array('class'=>'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>

        <h2>添加价格</h2><hr>

        {{ Form::open(array('url'=>'admin/prices/create', 'role'=>'form')) }}
        <div class="form-group">
            {{ Form::label('number_of_people', '人数') }}
            {{ Form::input('number', 'number_of_people', null, array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('price', '价格') }}
            {{ Form::text('price', null, array('class'=>'form-control')) }}
        </div>
		{{ Form::hidden('tour_id', $tour->id) }}
        {{ Form::submit('创建', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}

        <h2>图片管理</h2><hr>
        <ul>
            @foreach($photos as $photo)
                <li>
                    {{ HTML::image($photo->path, $photo->name, array('width'=>'25%')) }}
                    {{ Form::open(array('url'=>'admin/photos/destroy', 'class'=>'form-inline')) }}
                    {{ Form::hidden('id', $photo->id) }}
                    {{ Form::submit('删除', array('class'=>'btn btn-danger btn-xs')) }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>

        <h2>上传图片</h2><hr>

        {{ Form::open(array('url'=>'admin/photos/create', 'role'=>'form', 'files'=>true)) }}
        <div class="form-group">
            {{ Form::label('name', '名称') }}
            {{ Form::text('name', null, array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('path', '上传图片（为达到最好效果，请先调整图片大小至800x450像素）') }}
            {{ Form::file('path') }}
        </div>
		{{ Form::hidden('tour_id', $tour->id) }}
        {{ Form::submit('上传', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }}

        </div><!-- end col-md-12 -->
	</div><!-- end row -->

@stop
