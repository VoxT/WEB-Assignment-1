 @extends('admin.master')
 
@section('content')

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{$title}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Sản Phẩm</th>
                    <th>Ngày Đặt</th>
                    <th>Giờ Đặt</th>
                    <th>Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>
              @foreach($order as $data)
                <tr>
                    <td>OR{{ $data->idGiaoDich }}</td>
                    <td>{{ $data->getProduct->ten }}</td>
                    <td>{{ date('m/d/Y',  strtotime( $data->ngayTao)) }}</td>
                    <td>{{ date('H:m',  strtotime( $data->ngayTao)) }}</td>
                    <td>{{ substr_replace(
                         substr_replace( strval(intval($data->getProduct->gia*1000000) - intval($data->getProduct->gia*1000000)*$data->getProduct->giamGia/100), '.', -3,0), '.', -7, 0) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Sản Phẩm</th>
                    <th>Ngày Đặt</th>
                    <th>Giờ Đặt</th>
                    <th>Tổng Tiền</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->

</div>

@stop
