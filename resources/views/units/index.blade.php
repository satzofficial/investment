<x-app-layout>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header ">
                    <h5>Units </h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            {{-- <li class="">
                                <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="download">
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
                                    data-bs-placement="bottom" data-bs-original-title="print"><span><i
                                            class="fe fe-printer"></i></span> </a>
                            </li> --}}
                            <li>
                                <a class="btn btn-primary unit-add" href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#add_unit"><i class="fa fa-plus-circle me-2"
                                        aria-hidden="true"></i>Add Unit</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->


            <!-- All Invoice -->
            <div class="card invoices-tabs-card">
                <div class="invoices-main-tabs">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="invoices-tabs">
                                <ul>
                                    <li><a href="product-list.html">Product</a></li>
                                    <li><a href="category.html">Category</a></li>
                                    <li><a href="units.html" class="active">Units</a></li>
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
                    <div class="card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Unit Name</th>
                                            <th>Short Name</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($UnitsArr)
                                            @foreach ($UnitsArr as $key => $value)
                                                @php
                                                    $id = $value->id;
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ Str::ucfirst($value->name) }}</td>
                                                    <td>{{ $value->symbol }}</td>
                                                    <td class="d-flex align-items-center">
                                                        <a class="btn-action-icon me-2 unit-edit"
                                                            href="javascript:void(0);" data-id = "{{ encryptIt($id) }}"
                                                            data-url="{{ route('units.edit', ['id' => $id]) }}"
                                                            data-bs-toggle="modal" data-bs-toggle="modal"
                                                            data-bs-target="#edit_unit"><i class="fe fe-edit"></i></a>
                                                        <a class="btn-action-icon tableDeleteUrl" href="javascript:;"
                                                            data-ids="{{ encryptIt($id) }}" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal"><i
                                                                class="fe fe-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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

    <!-- Add Units Modal -->
    <div class="modal custom-modal fade" id="add_unit" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add Units</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('units.store') }}" method="post" class="myform" id="unit-add-form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="input-block mb-3">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Name"
                                        autocomplete="off" name="name">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="input-block mb-3">
                                    <label>Symbol <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Symbol"
                                        autocomplete="off" name="symbol">
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 col-sm-12">
                                <div class="input-block mb-0">
                                    <label>Parent Unit <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Parent Unit">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal"
                            class="btn btn-back cancel-btn me-2">Cancel</button>
                        <button type="submit" class="btn btn-primary paid-continue-btn">Add Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Units Modal -->


    <!-- Add Units Modal -->
    <div class="modal custom-modal fade" id="edit_unit" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Edit Units</h4>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="" method="post" class="myeditform" id="unit-edit-form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="input-block mb-3">
                                    <label>Name </label>
                                    <input type="text" class="form-control" placeholder="Enter Title"
                                        autocomplete="off" name="name" id="edit_name">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12">
                                <div class="input-block mb-3">
                                    <label>Symbol</label>
                                    <input type="text" class="form-control" placeholder="Enter Slug"
                                        autocomplete="off" name="symbol" id="edit_symbol">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal"
                            class="btn btn-primary paid-cancel-btn me-2">Cancel</button>
                        <button type="submit" class="btn btn-primary paid-continue-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Units Modal -->


    <!-- Delete Items Modal -->
    <div class="modal custom-modal fade" id="delete_modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3><span class="modelStr">Delete</span> Customer</h3>
                        <p>Are you sure want to <span class="modelStr">delete?</span></p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">

                            <div class="col-6">
                                <form action="" method="post" id="ModelDeleteUrl" class="deleteform">
                                    @csrf
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-continue-btn deletebtn"><span
                                            class="modelStr">Delete</span></button>
                                </form>
                            </div>

                            <div class="col-6">
                                <button type="reset" data-bs-dismiss="modal"
                                    class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Items Modal -->
    <script src="{{ asset(mix('assets/js/jquery-3.7.1.min.js')) }}"></script>
    <script>
        let tableDeleteUrl = '{{ route('units.destroy') }}';

        $(document).ready(function() {

            $(document).on('click', '.tableDeleteUrl', function(e) {
                e.preventDefault();
                let _this = $(this);
                const dataId = _this.data('ids');
                $('#ModelDeleteUrl').attr('action', (tableDeleteUrl + '?id=' + dataId));
            });

            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                let _this = $(this);
                let form = $('#ModelDeleteUrl');
                let url = $(form).attr("action");
                return caxios(url, form.serialize());
            })


            $(".myeditform").validate({
                rules: {
                    name: {
                        required: true
                    },

                    symbol: {
                        required: true
                    },

                },
                errorPlacement: function(error, element) {
                    // Check if the element is the image upload input
                    if (element.attr("id") === "inputGroupFile02") {
                        // Place the error message after the custom-file input
                        error.insertAfter(element.closest(".inputGroupFile02-error"));
                    } else {
                        // Use the default placement for other elements
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    // formData.submit();
                    // return;
                    let url = $(form).attr("action");
                    return caxios(url, form);
                },
            });

        });


        function caxios(url, form) {
            return axios
                .post(url, form)
                .then(function(response) {
                    // Handle the response from the backend
                    console.log('response.data', response.data);
                    if (response.data.status == true) {
                        toastr.success(response.data.msg);
                        setTimeout(() => {
                            window.location.href = response.data.redirect;
                        }, 2000);
                    } else {
                        toastr.error(response.data.msg);
                        // toastr.info(response.data.msg);
                    }
                })
                .catch(function(error) {
                    // Handle the error response from the backend
                    console.log('axiosError', error.response.data);
                    // Display error messages to the user
                    if (error.response.data.errors) {
                        $.each(
                            error.response.data.errors,
                            function(key, value) {
                                // $("#" + key).after(
                                //     '<div class="error-message">' +
                                //     value +
                                //     "</div>"
                                // );
                                toastr.error(value);
                            }
                        );
                    }
                });
        }
        var closeEditIcons = document.getElementsByClassName("unit-edit");
        for (let i = 0; i < closeEditIcons.length; i++) {
            closeEditIcons[i].addEventListener("click", function(e) {
                e.preventDefault();
                const url = this.getAttribute("data-url");
                const id = this.getAttribute("data-id")
                // Perform the AJAX request
                const formUrl = '{{ route('units.update') }}?id=' + id;
                const editForm = $('#unit-edit-form');
                const addForm = $('#unit-add-form');
                editForm.attr('action', formUrl);
                // addForm.removeClass('myform');
                // editForm.addClass('myform');

                axios
                    .post(`${url}`)
                    .then((response) => {
                        if (response.data.status == true) {
                            if (response.data.status == true) {
                                // console.log(response.data);
                                $.each(
                                    response.data.data,
                                    function(key, value) {
                                        $("#edit_" + key).val(value);
                                    }
                                );
                            }
                        } else {
                            // Swal.fire(
                            //     "Error!",
                            //     "Failed to delete the item.",
                            //     "error"
                            // );
                        }
                    })
                    .catch((error) => {
                        console.error("AJAX request failed:", error);
                        // Swal.fire(
                        //     "Error!",
                        //     "An error occurred during the request.",
                        //     "error"
                        // );
                    });
            });
        }
    </script>
</x-app-layout>
{{-- @includeIf($pageView == 'units', 'layouts.js'); --}}
{{-- @include('layouts.js'); --}}
