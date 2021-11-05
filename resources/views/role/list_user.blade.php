
@extends("admin.layout_admin")
@section("title","User")
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
                                        <li class="list-inline-item">List User</li>
                                    </ul>
                                </div>
                                <button >
                                    <a href="{{route('add_category')}}" class="au-btn au-btn-icon au-btn--green" ><i class="zmdi zmdi-plus"></i>Thêm User</button></a>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-xl-12">
            <!-- USER DATA-->
            <div class="user-data m-b-40">
                <h3 class="title-3 m-b-30">
                    <i class="zmdi zmdi-account-calendar"></i>user data</h3>

                <div class="table-responsive table-data">
                    <table class="table" >
                        <thead>
                        <tr>
                            <td>
{{--                                <label class="au-checkbox">--}}
{{--                                    <input type="checkbox">--}}
{{--                                    <span class="au-checkmark"></span>--}}
{{--                                </label>--}}
                            </td>
                            <td>name</td>
                            <td>role</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_users as $user)

                            <tr>

                                <td>
                                    <label class="au-checkbox">
                                        <input type="checkbox">
                                        <span class="au-checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="table-data__info">
                                        <h6>{{$user->full_name}}</h6>
                                        <span>
                                    <a href="#">{{$user->email}}</a>
                                </span>
                                    </div>
                                </td>

                                <td>
                                    <div class="rs-select2--trans rs-select2--sm">
                                        <select class="js-select2" name="property">

                                            @foreach($listRole as $role )
                                                <option data-id="{{$user->id}}" value="{{$role->id}}" {{($role->name == $user->role_name)?"selected":""}}  >{{$role->name}}</option>
                                            @endforeach


                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </td>




                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            <!-- END USER DATA-->
        </div>
        <script>
            $(document).ready(function(){

                $('select').on('change', function () {
                    //ways to retrieve selected option and text outside handler
                    let roleId = this.value;
                    let userId = $(this).find('option').filter(':selected').data('id');
                    updateRoleUser(roleId,userId);
                });

                function updateRoleUser(roleId,userId)
                {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url : "/public/admin/user",
                        type : "post",
                        data : {
                            role_id :roleId,
                            model_id :userId
                        },
                        success : function (result){
                            swal("Thành công!", "Đã cấp quyền thành công!", "success");
                        }
                    });
                }


            });
        </script>



@endsection

