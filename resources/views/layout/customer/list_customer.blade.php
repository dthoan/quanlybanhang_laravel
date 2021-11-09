
@extends("admin.layout_admin")
@section("title","List Customer")
@section("content")

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
                                    <li class="list-inline-item">List Customer</li>
                                </ul>
                            </div>
                           
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
                        <th>Họ Tên</th>
                        <th>Email</th>
               
                        <th>Số Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $sp)
                        <tr align="center">

                            <th class="text-left" >{{$sp->name}}</th>
                            <th class="text-left">{{$sp->email}}</th>
                    
                            <th class="text-left">{{$sp->phone_number}}</th>
                            <th class="text-left">{{$sp->address}}</th>
                            <th>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Chi Tiết">
                                        <a class="zmdi zmdi-mail-send"
                                           href="{{route('detail_customer',$sp->id)}}"
                                        >

                                        </a>

                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <a class="zmdi zmdi-edit" href="{{route('edit_customer',$sp->id)}}"></a>
{{--                                            <i class="zmdi zmdi-edit" href="{{route('edit_customer',$sp->id)}}"></i>--}}
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <a class="zmdi zmdi-delete"
                                           href="{{route('del_customer',$sp->id)}}"
                                           onclick="return confirm('Bạn có thật sự muốn xóa?????')">

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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
