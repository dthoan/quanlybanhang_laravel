
@extends("admin.layout_admin")
@section("title","List Category")
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
                                    <li class="list-inline-item">List Category</li>
                                </ul>
                            </div>
                            <button >
                                <a href="{{route('add_category')}}" class="au-btn au-btn-icon au-btn--green" ><i class="zmdi zmdi-plus"></i>Thêm Danh Mục</button></a>




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

        @elseif(Session::has("eroor"))
            <div class="alert alert-danger">
                {{Session::get("eroor")}}
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
                        <th>id</th>
                        <th>Tên danh mục</th>
                        <th>URL</th>
                        <th>Danh mục cha</th>
                        <th>Hình ảnh</th>
                        <th>Trạng thái</th>



                        <th>Action</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($item as $lsp)
                        <tr>
                            <td>{{$lsp->id}}</td>
                            <td>{{$lsp->name}}</td>
                            <td>{{$lsp->alias}}</td>

                            <td>
                                @if($lsp->p_type_product==0)
                                    ---
                                @else
                                    @foreach($item as $cate_sub)
                                        @if($cate_sub->id == $lsp->p_type_product)
                                            {{$cate_sub->name}}
                                        @endif
                                    @endforeach

                                @endif
                            </td>

                            <td><img  src=".\images\products\{{$lsp->images}}" alt="" height="90px" width="90px"></td>
                            <td>
                                @if($lsp->status==0)
                                    <span class="text-primary">Hiện</span>
                                @else
                                    <span class="text-danger">Ẩn</span>
                                @endif
                            </td>



                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">

                                        <i class="zmdi zmdi-mail-send"   >

                                        </i>

                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <a  href="{{route('edit_category',$lsp->id)}}">
                                        <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <a href="{{route('del_category',$lsp->id)}}" onclick="return confirm('Bạn có thật sự muốn xóa?????')">
                                                <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </button>
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </button>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <span>{{ $item->links() }}</span>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection
