@extends("admin.layout_")
@section("title","Kiểm duyệt đơn hàng")
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
    <div class="col-xl-12">
        <!-- USER DATA-->
        <div class="user-data m-b-40">
            <h3 class="title-3 m-b-30">
                <i class="zmdi zmdi-account-calendar"></i>user data</h3>
            <div class="filters m-b-45">
                <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                    <select class="js-select2" name="property">
                        <option selected="selected">All Properties</option>
                        <option value="">Products</option>
                        <option value="">Services</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
                <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                    <select class="js-select2 au-select-dark" name="time">
                        <option selected="selected">All Time</option>
                        <option value="">By Month</option>
                        <option value="">By Day</option>
                    </select>
                    <div class="dropDownSelect2"></div>
                </div>
            </div>
            <div class="table-responsive table-data">
                <table class="table">
                    <thead>
                    <tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>name</td>
                        <td>role</td>
                        <td>type</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <div class="table-data__info">
                                <h6>lori lynch</h6>
                                <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                            </div>
                        </td>
                        <td>
                            <span class="role admin">admin</span>
                        </td>
                        <td>
                            <div class="rs-select2--trans rs-select2--sm">
                                <select class="js-select2" name="property">
                                    <option selected="selected">Full Control</option>
                                    <option value="">Post</option>
                                    <option value="">Watch</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </td>
                        <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox" checked="checked">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <div class="table-data__info">
                                <h6>lori lynch</h6>
                                <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                            </div>
                        </td>
                        <td>
                            <span class="role user">user</span>
                        </td>
                        <td>
                            <div class="rs-select2--trans rs-select2--sm">
                                <select class="js-select2" name="property">
                                    <option value="">Full Control</option>
                                    <option value="" selected="selected">Post</option>
                                    <option value="">Watch</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </td>
                        <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <div class="table-data__info">
                                <h6>lori lynch</h6>
                                <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                            </div>
                        </td>
                        <td>
                            <span class="role user">user</span>
                        </td>
                        <td>
                            <div class="rs-select2--trans rs-select2--sm">
                                <select class="js-select2" name="property">
                                    <option value="">Full Control</option>
                                    <option value="" selected="selected">Post</option>
                                    <option value="">Watch</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </td>
                        <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="au-checkbox">
                                <input type="checkbox">
                                <span class="au-checkmark"></span>
                            </label>
                        </td>
                        <td>
                            <div class="table-data__info">
                                <h6>lori lynch</h6>
                                <span>
                                                                <a href="#">johndoe@gmail.com</a>
                                                            </span>
                            </div>
                        </td>
                        <td>
                            <span class="role member">member</span>
                        </td>
                        <td>
                            <div class="rs-select2--trans rs-select2--sm">
                                <select class="js-select2" name="property">
                                    <option selected="selected">Full Control</option>
                                    <option value="">Post</option>
                                    <option value="">Watch</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </td>
                        <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="user-data__footer">
                <button class="au-btn au-btn-load">load more</button>
            </div>
        </div>
        <!-- END USER DATA-->
    </div>
@endsection

