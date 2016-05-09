 @extends('admin.master')
 
@section('content')

      <div class="row">
      @if(isset($user))
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('public/admin/dist/img/user3-128x128.jpg') }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">Phân Quyền: {{ $user->role }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Join</b> <a class="pull-right">{{ date('m/d/Y', strtotime($user->created_at)) }}</a>
                </li>
              </ul>
            @if($user->getOrder->count() == 0)
              <button  class="btn btn-danger btn-flat btn-block" data-toggle="modal" data-target="#myModal"><b>Xoá Tài Khoản</b></button>
              <!-- Modal -->
                <div class="modal modal-danger"  id="myModal" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Xoá Người Dùng</h4>
                      </div>
                      <div class="modal-body text-center">
                        <p>Bạn có chắc muốn xoá Người dùng <span style="font-size: 150%; margin-left: 10px;">{{ $user->name }}</span></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Huỷ</button>
                        <a href="{{ url('manager/user/duid='.$user->id)}}" type="button" class="btn btn-outline">Xoá</a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
            @else 
              <button  class="btn btn-danger btn-flat btn-block" data-toggle="modal" data-target="#myModal" disabled=""><b>Xoá Tài Khoản</b></button>
            @endif

               

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Liên Hệ</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-mobile" aria-hidden="true"></i> Số Điện Thoại</strong>

              <h4 class="text-muted text-center">
                {{ $user->sodienthoai}}
              </h4>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Địa Chỉ</strong>

              <p class="text-muted">{{ $user->diachi}}</p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box">
             <div class="box-body">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Sản Phẩm</th>
                          <th>Ngày Đặt</th>
                          <th>Tổng Tiền</th>
                          <th>Tạng Thái</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($order as $data)
                      <tr>
                          <td>OR{{ $data->idGiaoDich }}</td>
                          <td>{{ $data->getProduct->ten }}</td>
                          <td>{{ date('m/d/Y',  strtotime( $data->ngayTao)) }}</td>
                          <td>{{ substr_replace(
                               substr_replace( strval(intval($data->getProduct->gia*1000000) - intval($data->getProduct->gia*1000000)*$data->getProduct->giamGia/100), '.', -3,0), '.', -7, 0) }}</td>
                          <td>@if($data->trangThaiThanhToan == 0) Chưa Xác Nhận @endif
                              @if($data->trangThaiThanhToan == 1) Đang Giao @endif
                              @if($data->trangThaiThanhToan == 2) Đã Hoàn Thành @endif
                            
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <th>Order ID</th>
                          <th>Sản Phẩm</th>
                          <th>Ngày Đặt</th>
                          <th>Tổng Tiền</th>
                          <th>Trạng Thái</th>
                      </tr>
                  </tfoot>
              </table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
        <!-- /.col -->
      @else
        <div class="error-page">
        <div class="error-content" style="margin: 200px 0px 0px 50px">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Người dùng không tồn tại..</h3>
        </div>
        <!-- /.error-content -->
        </div>
      @endif
      </div>
      <!-- /.row -->

    </section>

@stop