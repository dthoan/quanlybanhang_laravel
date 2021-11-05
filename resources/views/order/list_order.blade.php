@extends("admin.layout_admin")
@section("title","List order")
@section("content")
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <span class="au-breadcrumb-span">You are here:</span>
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="{{route('index')}}">Trang Chủ</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item">List Order</li>
                            </ul>
                        </div>
                        <button class="au-btn au-btn-icon au-btn--green">
                            <i class="zmdi zmdi-plus"></i>Thêm Đơn Hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="center">
    @if(Session::has("thongbao"))
    <div class="alert alert-success">
        {{Session::get("thongbao")}}
    </div>
    @endif
</div>
<!-- END BREADCRUMB-->
<div class="row m-t-5">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã Khách hàng</th>
                        <th>Tên Khách Hàng</th>
                      
                        <th>Tổng SL</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Trạng thái</th>
                        <th>Thao Tác</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($item as $sp)
                    <tr align="center">
                        <th>{{$sp->bill_id}}</th>
                        <th>{{$sp->user_id}}</th>
                        <th>{{$sp->ten_khach_hang}}</th>
                        <th>{{$sp->sum_quantity}}</th>
                        <th>{{$sp->total}}</th>
                        <th>{{date('d/m/Y H:i:s',strtotime($sp->created_at))}}</th>
                        <th>
                            @if($sp->status == 2)
                            Chưa duyệt
                            @else($sp->status == 1)
                            Đã xử lý
                            @endif
                        </th>
                        <th>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Chi Tiết">
                                    <a class="zmdi zmdi-mail-send" href="{{route('detail_order',$sp->bill_id)}}">

                                    </a>

                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete"  onclick="return confirm('Bạn có thật sự muốn xóa?????')">
                                    <a class="zmdi zmdi-delete" href="{{route('del_order',$sp->bill_id)}}">

                                    </a>
                                </button>
                                <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                    <i class="zmdi zmdi-more"></i>
                                </button>
                            </div>
                        </th>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
<!-- <script>
    fucntion notification() {
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    }
</script> -->

@endsection