
<style>
    thead, tbody { display: block; }

    tbody {
        height: 250px;       /* Just for the demo          */
        overflow-y: auto;    /* Trigger vertical scroll    */
        overflow-x: hidden;  /* Hide the horizontal scroll */
    }

</style>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Danh sách sản phẩm</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <label for="text-input" class=" form-control-label">Tìm kiếm</label>
                        </div>
                        <div class="col-12 col-md-9 ">
{{--                            có name rồi mà ta--}}
                            <input type="text" id="keySearch" name='key' class="form-control">
                        </div>
                        <div  class="col-3">
                            <button type="button" id="btnSearch" class="btn btn-primary">Search</button>
                        </div>
                        <p>Tìm thấy {{count($productSearch)}} sản phẩm</p>
                    </div>
                    <div id="table-data" class="row">

                        <div class="col-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Select Day</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá bán</th>
                                    <th scope="col">Trạng thái</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($productSearch as $search)

                                    <tr>
                                        <td>
                                            <input type="checkbox" class="customCheck1" name="id_product" value ="">
                                        </td>
                                        <td>{{$search->name}}</td>
                                        <td>{{$search->unit_price}}</td>
                                        <td>{{$search->new}}</td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{--    phân trang--}}
<script>
    $(document).ready(function(){

        $('#exampleModal button#btnSearch').on('click', function(e) {
            e.preventDefault();
            var keySearch = $("#keySearch").val();
            search_data(keySearch);
            return false;
        });

        $('#exampleModal .pagination a').unbind('click').on('click', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var keySearch = $("#keySearch").val();
            search_data(keySearch,page);
            return false;
        });


        function search_data(keySearch,page=1)
        {
            $.ajax({
                url: "/public/admin/add-promotion/fetch_data?page="+page+"&key="+keySearch,
                success:function(data)
                {
                    reloadPage(data,keySearch);
                }
            });
        }

        function reloadPage(data,keySearch){
            $('#table_data').html(data);
            $(".modal-backdrop").remove();
            $('#exampleModal').modal();
            $("#keySearch").val(keySearch);
        }
    });
</script>
