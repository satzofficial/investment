<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="content-page-header ">
                <h5>Category </h5>
                <div class="list-btn">
                    <ul class="filter-list">
                        <li>
                            <a class="btn btn-filters w-auto popup-toggle" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Filter"><span class="me-2"><img
                                        src="assets/img/icons/filter-icon.svg" alt="filter"></span>Filter </a>
                        </li>
                        <li class="">
                            <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Download">
                                <a href="#" class="btn-filters" data-bs-toggle="dropdown"
                                    aria-expanded="false"><span><i class="fe fe-download"></i></span></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="d-block">
                                        <li>
                                            <a class="d-flex align-items-center download-item"
                                                href="javascript:void(0);" download><i
                                                    class="far fa-file-pdf me-2"></i>PDF</a>
                                        </li>
                                        <li>
                                            <a class="d-flex align-items-center download-item"
                                                href="javascript:void(0);" download><i
                                                    class="far fa-file-text me-2"></i>CVS</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a class="btn-filters" href="javascript:void(0);" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-original-title="Print"><span><i
                                        class="fe fe-printer"></i></span> </a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#add_category"><i class="fa fa-plus-circle me-2"
                                    aria-hidden="true"></i>Add Category</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <div id="filter_inputs" class="card filter-card">
            <div class="card-body pb-0">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Email</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="input-block mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Search Filter -->

        <!-- All Invoice -->
        <div class="card invoices-tabs-card">
            <div class="invoices-main-tabs">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="invoices-tabs">
                            <ul>
                                <li><a href="product-list.html">Product</a></li>
                                <li><a href="category.html" class="active">Category</a></li>
                                <li><a href="units.html">Units</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /All Invoice -->

        <!-- Table -->
        <div class="row">
            <div class="col-sm-12">
                <div class=" card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Total Products</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/product-list-img.jpg"
                                                    alt="product-list"><span>Advertising</span></a></td>
                                        <td>60</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/product-list-img-2.jpg"
                                                    alt="product-list"><span>Food</span></a></td>
                                        <td>55</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-03.jpg"
                                                    alt="product-list"><span>Furniture</span></a></td>
                                        <td>70</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-04.jpg"
                                                    alt="product-list"><span>Repairs</span></a></td>
                                        <td>82</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-05.jpg"
                                                    alt="product-list"><span>Laptop</span></a></td>
                                        <td>26</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-06.jpg"
                                                    alt="product-list"><span>Shoes</span></a></td>
                                        <td>60</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-07.jpg"
                                                    alt="product-list"><span>Accessories</span></a></td>
                                        <td>20</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-08.jpg"
                                                    alt="product-list"><span>Phone</span></a></td>
                                        <td>37</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-09.jpg"
                                                    alt="product-list"><span>Bags</span></a></td>
                                        <td>52</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td><a href="#" class="product-list-item-img"><img
                                                    src="assets/img/category-img-10.jpg"
                                                    alt="product-list"><span>Speaker</span></a></td>
                                        <td>156</td>
                                        <td class="d-flex align-items-center">
                                            <a class=" btn-action-icon me-2" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#edit_category"><i
                                                    class="fe fe-edit"></i></a>
                                            <a class=" btn-action-icon" href="javascript:void(0);"
                                                data-bs-toggle="modal" data-bs-target="#delete_modal"><i
                                                    class="fe fe-trash-2"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Table -->

    </div>
</div>
<!-- /Page Wrapper -->


<!-- Add Category Modal -->
<div class="modal custom-modal fade" id="add_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Add Category</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-group-item border-0 pb-0 mb-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" placeholder="Enter Slug">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Parent Category</label>
                                                <select class="select">
                                                    <option>None</option>
                                                    <option>Coupons</option>
                                                    <option>News</option>
                                                    <option>Plugins</option>
                                                    <option>Themes</option>
                                                    <option>Tutorial</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-0 pb-0">
                                                <label>Image</label>
                                                <div class="input-block service-upload mb-0">
                                                    <span><img src="assets/img/icons/drop-icon.svg"
                                                            alt="upload"></span>
                                                    <h6 class="drop-browse align-center">Drop your files here
                                                        or<span class="text-primary ms-1">browse</span></h6>
                                                    <p class="text-muted">Maximum size: 50MB</p>
                                                    <input type="file" multiple="" id="image_sign">
                                                    <div id="frames"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal"
                        class="btn btn-back cancel-btn me-2">Cancel</button>
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Add
                        Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Category Modal -->

<!-- Add Category Modal -->
<div class="modal custom-modal fade" id="edit_category" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <div class="form-header modal-header-title text-start mb-0">
                    <h4 class="mb-0">Edit Category</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="form-group-item border-0 pb-0 mb-0">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="Advertising"
                                                    placeholder="Enter Title">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" value="advertising"
                                                    placeholder="Enter Slug">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Parent Category</label>
                                                <select class="select">
                                                    <option>None</option>
                                                    <option>Coupons</option>
                                                    <option>News</option>
                                                    <option>Plugins</option>
                                                    <option>Themes</option>
                                                    <option>Tutorial</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="input-block mb-0 pb-0">
                                                <label>Image</label>
                                                <div class="input-block service-upload mb-0">
                                                    <span><img src="assets/img/icons/drop-icon.svg"
                                                            alt="upload"></span>
                                                    <h6 class="drop-browse align-center">Drop your files here
                                                        or<span class="text-primary ms-1">browse</span></h6>
                                                    <p class="text-muted">Maximum size: 50MB</p>
                                                    <input type="file" multiple="" id="image_sign2">
                                                    <div id="frames2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal"
                        class="btn btn-primary paid-cancel-btn me-2">Cancel</button>
                    <button type="submit" data-bs-dismiss="modal"
                        class="btn btn-primary paid-continue-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Vendor Modal -->
