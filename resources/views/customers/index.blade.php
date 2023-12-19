<x-app-layout>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="content-page-header">
                    <h5>Customers</h5>
                    <div class="list-btn">
                        <ul class="filter-list">
                            {{-- <li>
                                <div class="dropdown dropdown-action" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Download">
                                    <a href="#" class="btn-filters" data-bs-toggle="dropdown"
                                        aria-expanded="false"><span><i class="fe fe-download"></i></span></a>
                                    <div class="dropdown-menu dropdown-menu-end">
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
                                    data-bs-placement="bottom" title="Print"><span><i class="fe fe-printer"></i></span>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-import" href="javascript:void(0);"><span><i
                                            class="fe fe-check-square me-2"></i>Import Customer</span></a>
                            </li> --}}
                            <li>
                                <a class="btn btn-primary" href="{{ route('customers.add') }}"><i
                                        class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Customer</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->
            {{-- <div id="filter_inputs" class="card filter-card">
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
            </div> --}}
            <!-- /Search Filter -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Balance </th>
                                            <th>Total Invoice </th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($CustomerArr)
                                            @foreach ($CustomerArr as $key => $value)
                                                @php
                                                    $id = $value->id;
                                                @endphp
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="profile.html" class="avatar avatar-md me-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ customerImage($id) }}" alt="User Image"></a>
                                                            <a href="profile.html">{{ Str::ucfirst($value->name) }}
                                                                <span><span class="__cf_email__"
                                                                        data-cfemail="5e343136301e3b263f332e323b703d3133">{{ $value->email }}</span></span></a>
                                                        </h2>
                                                    </td>
                                                    <td>{{ $value->phone ?? '-' }}</td>
                                                    <td>$4,220</td>
                                                    <td>2</td>
                                                    <td>{{ $value->created_at }}</td>
                                                    <td>
                                                        @php
                                                            if ($value->status == 1) {
                                                                echo '<span class="badge bg-success-light">Active</span>';
                                                            } else {
                                                                echo '<span class="badge bg-danger-light">Inactive</span>';
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td class="d-flex align-items-center">
                                                        <a href="add-invoice.html" class="btn btn-greys me-2"><i
                                                                class="fa fa-plus-circle me-1"></i> Invoice</a>
                                                        <a href="customers-ledger.html" class="btn btn-greys me-2"><i
                                                                class="fa-regular fa-eye me-1"></i> Ledger</a>
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class=" btn-action-icon "
                                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                    class="fas fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="edit-customer.html"><i
                                                                                class="far fa-edit me-2"></i>Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item tableDeleteUrl"
                                                                            href="javascript:void(0);"
                                                                            data-id="{{ encryptIt($id) }}"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete_modal"><i
                                                                                class="far fa-trash-alt me-2"></i>Delete</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item"
                                                                            href="customer-details.html"><i
                                                                                class="far fa-eye me-2"></i>View</a>
                                                                    </li>
                                                                    @if ($value->status == 0)
                                                                        <li>
                                                                            <a class="dropdown-item customerssstatus"
                                                                                data-status="1" data-bs-toggle="modal"
                                                                                data-id="{{ encryptIt($id) }}"
                                                                                data-bs-target="#delete_modal"
                                                                                href="javascript:;"><i
                                                                                    class="fa-solid fa-power-off me-2"></i>Activate</a>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <a class="dropdown-item customerssstatus"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal"
                                                                                data-status="0"
                                                                                data-id="{{ encryptIt($id) }}"
                                                                                href="javascript:;"><i
                                                                                    class="far fa-bell-slash me-2"></i>Deactivate</a>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
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
        </div>
    </div>
    <!-- /Page Wrapper -->

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
                                <form action="" method="post" id="ModelDeleteUrl" class="myform">
                                    @csrf
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-continue-btn"><span
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


    <script>
        let tableDeleteUrl = '{{ route('customers.destroy') }}';
        let tableStatusUrl = '{{ route('customers.status') }}';


        document.addEventListener('DOMContentLoaded', function() {
            // Add a click event listener to the document
            document.addEventListener('click', function(event) {
                const dataId = event.target.getAttribute('data-id');
                // Check if the clicked element has the 'clickable' class
                if (event.target.classList.contains('tableDeleteUrl')) {
                    // Access the data-id attribute of the clicked element
                    alert(dataId);
                    const myForm = document.getElementById('ModelDeleteUrl').action = tableDeleteUrl +
                        '?id=' + dataId;
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Add a click event listener to the document
            document.addEventListener('click', function(event) {
                const dataId = event.target.getAttribute('data-id');
                const dataStatus = event.target.getAttribute('data-status');
                // Check if the clicked element has the 'clickable' class
                if (event.target.classList.contains('customerssstatus')) {
                    // Access the data-id attribute of the clicked element                    
                    const myForm = document.getElementById('ModelDeleteUrl').action = tableStatusUrl +
                        '?id=' + dataId;
                    var elements = document.getElementsByClassName('modelStr');
                    if (dataStatus == 1) {
                        for (var i = 0; i < elements.length; i++) {
                            elements[i].innerHTML = 'Inactivate';
                        }
                    } else {
                        document.getElementsByClassName('modelStr').innerHTML = 'Activate';
                        for (var i = 0; i < elements.length; i++) {
                            elements[i].innerHTML = 'Activate';
                        }
                    }

                }
            });
        });
    </script>
</x-app-layout>
