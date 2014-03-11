@extends('layouts.main')

@section('header')

  <header class="hidden-xs">
      <div id="carousel-header" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-header" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-header" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/background-slide-1.jpg" alt="悉尼暮色">
            <div class="carousel-caption">
              <h2 class="header-title">悉尼暮色</h2>
            </div>
          </div>
          <div class="item">
            <img src="img/background-slide-2.jpg" alt="蓝山风光">
            <div class="carousel-caption">
              <h2 class="header-title">蓝山风光</h2>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-header" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-header" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </header>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">悉尼旅游行程 Sydney Tours</h1>
          <p class="lead text-error text-center">丰富多彩，多重选择，尽览悉尼山水人文之美景。</p>
        </div>
    </div>

    <div class="row">
    @foreach($tours as $tour)
      <div class="col-md-4">
        <a href="/tour/{{ $tour->id }}" class="route">
          <div class="offer-wrap">
            {{ HTML::image($tour->thumbnail, $tour->title) }}
            <div class="padding">
              <h2 class="text-center text-info">{{ $tour->title }}</h2>
            </div><!-- end padding -->
          </div><!-- end offer-wrap -->
        </a>
      </div><!-- end col-md-4 -->
    @endforeach
    </div><!-- end row -->  
    
    </div>

@stop

