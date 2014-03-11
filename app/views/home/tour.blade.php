@extends('layouts.main')

@section('header')

    <header class="hidden-xs inner"></header>

@stop

@section('content')

        @if($errors->has())
        <div class="text-danger">
            <p>请修复以下错误后重新提交：</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><!-- end text-danger -->
        @endif

        <div class="row">
          <div class="col-md-6">
            <h2 class="route-name">{{ $tour->title }}</h2>
            <p>{{ nl2br($tour->description) }}</p>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>收费标准</th>
                  <th>价格</th>
                </tr>
              </thead>
              <tbody>
                @foreach($prices as $price)
                <tr>
                  <td>{{ $price->number_of_people }}位团</td>
                  <td>${{ $price->price }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="row">
              <div class="col-md-12">
                <fieldset>
                <legend>行程订单</legend>
                {{ Form::open(array('url'=>'orders/create', 'role'=>'form', 'class'=>'form-horizontal')) }}
                  <div class="form-group">
                    {{ Form::label('date', '参加日期', array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-4">
                      {{ Form::input('date', 'date', null, array('class'=>'form-control')) }}
                    </div>
                    {{ Form::label('number_of_people', '参加人数', array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-4">
                      {{ Form::input('number', 'number_of_people', null, array('class'=>'form-control')) }}
                    </div>
                  </div>

                  <div class="form-group">
                    {{ Form::label('name', '您的姓名', array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-4">
                      {{ Form::text('name', null, array('class'=>'form-control')) }}
                    </div>
                    {{ Form::label('telephone', '联系电话', array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-4">
                      {{ Form::input('tel', 'telephone', null, array('class'=>'form-control')) }}
                    </div>
                  </div>

                  <div class="form-group">
                    {{ Form::label('email', '电子邮件', array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-10">
                      {{ Form::input('email', 'email', null, array('class'=>'form-control')) }}
                    </div>
                  </div>

                  <div class="form-group">
                    {{ Form::label('address', '联系地址', array('class'=>'col-sm-12 control-label long-label')) }}
                    <div class="col-sm-12">
                      {{ Form::textarea('address', null, array('class'=>'form-control', 'rows'=>3)) }}
                    </div>
                  </div>

                  <div class="form-group">
                    {{ Form::label('others', '其他特殊要求 (如有小孩，请注明几岁)', array('class'=>'col-sm-12 control-label long-label')) }}
                    <div class="col-sm-12">
                      {{ Form::textarea('others', null, array('class'=>'form-control', 'rows'=>5)) }}
                    </div>
                  </div>

                  {{ Form::hidden('tour_id', $tour->id) }}
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      {{ Form::submit('提交', array('class'=>'btn btn-primary')) }}
                      {{ Form::reset('清除', array('class'=>'btn btn-default')) }}
                    </div>
                  </div>
                {{ Form::close() }}
              </fieldset>
              </div>
            </div>

          </div>
          <div class="col-md-6">
            <h2 class="text-center">图库</h2>
            @foreach($photos as $photo)
            <div class="col-xs-12 col-md-6">
              <a href="{{ '/'.$photo->path }}" class="thumbnail">{{ HTML::image($photo->path, $photo->name) }}</a>
            </div>
            @endforeach
          </div>
        </div>

@stop

