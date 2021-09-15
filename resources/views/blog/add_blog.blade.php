@extends("layout.layout")
@section("title","Pustok - Thêm blog")
@section("content")

    <div class="container">
        <section class="breadcrumb-section">
            <h2 class="sr-only">Site Breadcrumb</h2>
            <div class="container">
                <div class="breadcrumb-contents">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
        <form action="{{URL::to('/trangchu/cau-hoi')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf

            <div class="form-group">
                <label for="formGroupExampleInput">Câu hỏi</label>
                <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Nhập câu hỏi">
            </div>

            <div class="form-group" style="height: auto !important;">
                <label for="exampleFormControlSelect1">Chủ đề</label>
                <select class="form-control" id="p_theme">
                    <option class="form-group" value="0">--Danh mục cha--</option>
                    @foreach($chude as  $cate)
                        @if($cate->p_theme ==0)
                            <option class="form-group" value="{{$cate->id_theme}}">{{$cate->theme_name}}</option>
                            @foreach($chude  as $cate_option)
                                @if($cate_option->p_theme != 0 && $cate_option->p_theme == $cate->id_theme)
                                    <option class="form-group"  value="{{$cate_option->id_theme}}">{{'--'.$cate_option->theme_name}}</option>
                                @endif

                            @endforeach
                        @endif
                    @endforeach
                </select>

            </div>



            <div class="form-group">
                <label for="formGroupExampleInput2">Nhập câu hỏi chi tiết</label>
                <textarea class="form-control" id="ckeditor" name="description" rows="5"></textarea>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#ckeditor' ), {
                            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                        } )
                        .then( editor => {
                            window.editor = editor;
                        } )
                        .catch( err => {
                            console.error( err.stack );
                        } );
                </script>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>


@endsection

