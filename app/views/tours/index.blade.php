@extends('layouts.main')

@section('content')

	<div class="row">
		<div class="col-md-12">
		<h1>旅游路线管理</h1>
		<hr />
		<h2>路线列表</h2><hr>
		<ul>
			@foreach($tours as $tour)
				<li>
					{{ $tour->title }} -
					{{ Form::open(array('url'=>'admin/tours/destroy', 'class'=>'form-inline')) }}
					{{ Form::hidden('id', $tour->id) }}
					{{ Form::submit('删除', array('class'=>'btn btn-danger btn-xs')) }}
					{{ Form::close() }}
                    <a href="/admin/tours/edit/{{ $tour->id }}"><input type="button" value="编辑" class="btn btn-info btn-xs" /></a>
				</li>
			@endforeach
		</ul>

		<h2>创建新路线</h2><hr>

		@if($errors->has())
		<div class="text-danger">
			<p>请修复以下错误，重新提交：</p>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end text-danger -->
		@endif

		{{ Form::open(array('url'=>'admin/tours/create', 'files'=>true, 'role'=>'form')) }}
		<div class="form-group">
			{{ Form::label('title', '路线名称') }}
			{{ Form::text('title', null, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('description', '详细介绍') }}
			{{ Form::textarea('description', null, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('thumbnail', '上传首页图片（为达到最好效果，请先调整图片大小至800x450像素）') }}
			{{ Form::file('thumbnail') }}
		</div>
		{{ Form::submit('创建', array('class'=>'btn btn-primary')) }}
		{{ Form::close() }}
		</div><!-- end .col-md-12 -->
	</div><!-- end .row -->

@stop
