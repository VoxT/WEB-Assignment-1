@extends('templates.master')
 
@section('content')

<div class="container text-center">
    <div class="content-404">
    <div class="row">
        <div class="col-md-4 col-xs-12 col-md-offset-4">
          <img src="{{ asset('public/images/404.png') }}" class="img-responsive" alt="">
        </div>
        <div class="col-md-12">
          <h1><b>OPPS!</b> Chúng Tôi Không Thể Tìm Thấy Trang Này.</h1>
        </div>
    </div>
  </div>
</div>

@stop