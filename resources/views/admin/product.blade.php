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
                    <th>Product ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Ngày Tạo</th>
                </tr>
            </thead>
            <tbody>
              @foreach($product as $data)
                <tr>
                    <td>DT{{ $data->idDienThoai }}</td>
                    <td>{{ $data->ten }}</td>
                    <td>{{ substr_replace(
                         substr_replace( strval(intval($data->gia*1000000) - intval($data->gia*1000000)*$data->giamGia/100), '.', -3,0), '.', -7, 0) }}</td>
                    <td>{{ $data->soLuong }}</td>
                    <td>{{ date('m/d/Y',  strtotime( $data->ngayTao)) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Product ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Ngày Tạo</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->

</div>

@stop
