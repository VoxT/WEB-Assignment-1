 @extends('admin.master')
 
@section('content')

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title}}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Ngày Đăng Kí</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach($user as $data)
                <tr>
                    <td><a href="{{ url('manager/user/uid='.$data->id)}}" style="font-size: 110%">{{ $data->name }}</a></td>
                    <td>{{ $data->email }}</td>
                    <td>{{ date('m/d/Y', strtotime($data->created_at)) }}</td>
                    <td><a href="{{ url('manager/user/uid='.$data->id)}}" class="btn btn-info btn-flat pull-right"><b>Xem Chi Tiết <i style=" margin-top: 2px; " class="fa fa-fw fa-info-circle"></i></b></a></td>
                    <td>                
                    @if($data->getOrder->count() == 0)
                        <button  class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-href="{{ url('manager/user/duid='.$data->id)}}" data-username="{{ $data->name }}">
                    @else 
                        <button  class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModal" data-href="#" data-username="" disabled="disabled">
                    @endif
                            <b>Xoá Người Dùng <i style="margin-top: 2px; " class="fa fa-fw fa-trash"></i></b>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Ngày Đăng Kí</th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->


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
            <p>Bạn có chắc muốn xoá Người dùng <span style="font-size: 150%; margin-left: 10px;" id="username"></span></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Huỷ</button>
            <a href="" type="button" class="btn btn-outline" id="link">Xoá</a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

     @if(session('success'))
    <div class="modal modal-success" id="successModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Xoá Thành Công</h4>
            </div>
            <div class="modal-body text-center">
              <p>Đã xoá thành công người dùng <span style="font-size: 150%; margin-left: 10px;">{{ session('success') }}</span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endif

    @if(session('error'))
    <div class="modal modal-warning" id="successModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Không Thể Xoá</h4>
            </div>
            <div class="modal-body text-center">
              <p>Không thể Xoá người dùng <span style="font-size: 150%; margin-left: 10px;">{{ session('error') }}</span> vì còn quan hệ tới dữ liệu khác</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endif

</div>

<!-- jQuery 2.2.0 -->
<script src="{{ asset('public/admin/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
<script type="text/javascript">
   
   $( document ).ready(function() {
      $('#successModal').modal('show');
     $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var href = button.data('href'); // Extract info from data-* attributes
          var username = button.data('username'); // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this);
          modal.find('#link').attr("href", href);
          modal.find('#username').text(username);
    })
  });
</script>
@stop
