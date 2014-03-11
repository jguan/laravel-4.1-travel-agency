@extends('layouts.main')

@section('content')

    <div class="row">
    <div class="col-md-12">
    <h1>管理订单</h1>

    <table class="table table-striped">
        <tr>
            <th>订单#</th>
            <th>旅游路线</th>
            <th>日期</th>
            <th>人数</th>
            <th>联系人</th>
            <th>电话</th>
            <th>电子邮件</th>
            <th>地址</th>
            <th>其他</th>
            <th>确认订单</th>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->tour->title }}</td>
            <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
            <td>{{ $order->number_of_people }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->telephone }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ nl2br($order->address) }}</td>
            <td>{{ nl2br($order->others) }}</td>
            <td>
                {{ Form::open(array('url'=>'admin/orders/manage', 'class'=>'form-inline'))}}
                {{ Form::hidden('id', $order->id) }}
                {{ Form::select('is_confirmed', array('未确认', '已确认'), $order->is_confirmed, array('class'=>'form-control')) }}
                {{ Form::submit('更新', array('class'=>'btn btn-primary btn-sm')) }}
                {{ Form::close() }}
            </td>
        </tr>
        @endforeach

    </table>

    </div><!-- end col-md-12 -->
    </div><!-- end row -->

@stop

@section('pagination')

    <div class="row">
    <div class="col-md-12">
        {{ $orders->links() }}
    </div><!-- end col-md-12 -->
    </div><!-- end row -->

@stop
