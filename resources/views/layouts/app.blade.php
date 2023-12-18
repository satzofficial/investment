@php
    $routerNameArr = ['customers'];
    $currentRouterName = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Warehouse') }}</title>

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset(mix('assets/css/bootstrap.min.css')) }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    {{-- @dd($routerNameArr, $currentRouterName, isStrExistOrNot($routerNameArr, $currentRouterName)) --}}
    @if (isStrExistOrNot($routerNameArr, $currentRouterName))
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    @endif

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">

    <!-- Intl Tell Input CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/intlTelInput/css/intlTelInput.css') }}">

    <!-- Main CSS -->
    {{-- <link rel="stylesheet" href="{{ asset(mix('assets/css/style.css')) }}"> --}}

    <!-- All CSS -->
    <link rel="stylesheet" href="{{ asset(mix('css/all.css')) }}">

    <!-- Layout JS -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <style>
        .error,
        .star {
            color: red !important;
        }
    </style>
</head>
<!-- Main Wrapper -->
<div class="main-wrapper">
    @include('layouts.navigation')
    <!-- Page Content -->
    {{ $slot }}
</div>

<script src="{{ asset(mix('assets/js/jquery-3.7.1.min.js')) }}"></script>


<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('assets/js/feather.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

<!-- Intl Tell Input js -->
<script src="{{ asset('assets/plugins/intlTelInput/js/intlTelInput-jquery.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>

<!-- Theme Settings JS -->
<script src="{{ asset('assets/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/js/greedynav.js') }}"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
{{-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"> --}}

@if (isStrExistOrNot($routerNameArr, $currentRouterName))
    <!-- Datatable JS -->
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
@endif
<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>

{{-- <script src="{{ asset(mix('assets/js/app.js')) }}"></script> --}}
<script>
    $(document).ready(function() {
        

        // Custom validation method for checking the file extension
        $.validator.addMethod(
            "extension",
            function(value, element, param) {
                param =
                    typeof param === "string" ?
                    param.replace(/,/g, "|") :
                    "png|jpe?g|gif";
                return (
                    this.optional(element) ||
                    value.match(new RegExp("\\.(" + param + ")$", "i"))
                );
            },
            $.validator.format(
                "Please enter a value with a valid extension."
            )
        );

        // Custom validation rule for multiple images
        $.validator.addMethod(
            "validateImages",
            function(value, element) {
                // You can add your custom logic here to validate multiple images
                // For example, check the number of selected images
                return element.files.length > 0;
            },
            "Please select at least one image."
        );
        $(".myform").validate({
            rules: {
                name: {
                    required: true
                },
                phone: {
                    required: true,
                    min: 10
                },
                currency: {
                    required: true
                },
                website: {
                    required: true
                },
                notes: {
                    required: true
                },
                bank_name: {
                    required: true
                },
                bank_branch: {
                    required: true
                },
                bank_account_holder: {
                    required: true
                },
                bank_account: {
                    required: true
                },
                bank_ifsc: {
                    required: true
                },

                selling_price: {
                    required: true
                },
                account: {
                    required: true
                },
                description: {
                    required: true
                },
                cost_price: {
                    required: true
                },
                purchase_account: {
                    required: true
                },
                purchase_description: {
                    required: true
                },
                preferred_vendor: {
                    required: true
                },
                opening_stock: {
                    required: true
                },
                opening_stock_rate_per_unit: {
                    required: true
                },
                reorder_point: {
                    required: true
                },
                "profile_image": {
                    validateImages: true,
                    extension: "png|jpg|jpeg|gif",
                },
                "images[]": {
                    validateImages: true,
                    extension: "png|jpg|jpeg|gif",
                },
                email: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter your name"
                },
                sku: {
                    required: "Please enter your sku"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address",
                },
                "images[]": {
                    validateImages: "Please select at least one image.",
                    extension: "Please select a valid image file (png, jpg, jpeg, gif).",
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
                axios
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
                                    $("#" + key).after(
                                        '<div class="error-message">' +
                                        value +
                                        "</div>"
                                    );
                                }
                            );
                        }
                    });

                return;
            },
        });

        $(document).on("click", ".submit-all", function(e) {
            e.preventDefault();
            $("#myform-submit-btn").click();
        });

        // var closeIcons = document.getElementsByClassName("show-alert");
        // for (let i = 0; i < closeIcons.length; i++) {
        //     closeIcons[i].addEventListener("click", function(e) {
        //         e.preventDefault();

        //         Swal.fire({
        //             title: "Are you sure?",
        //             text: "You won't be able to revert this!",
        //             icon: "warning",
        //             showCancelButton: true,
        //             confirmButtonText: "Yes, delete it!",
        //             cancelButtonText: "No, cancel!",
        //             reverseButtons: true,
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 // User clicked "Yes, delete it!"
        //                 const url = this.getAttribute("data-url");

        //                 // Perform the AJAX request
        //                 axios
        //                     .post(`${url}`)
        //                     .then((response) => {
        //                         if (response.data.status == true) {
        //                             // Swal.fire('Deleted!', 'Your item has been deleted.', 'success');
        //                             if (response.data.status == true) {
        //                                 window.toastr.success(response.data.msg);
        //                                 setTimeout(() => {
        //                                     window.location.reload(true);
        //                                 }, 1000);
        //                             }
        //                         } else {
        //                             Swal.fire(
        //                                 "Error!",
        //                                 "Failed to delete the item.",
        //                                 "error"
        //                             );
        //                         }
        //                     })
        //                     .catch((error) => {
        //                         console.error("AJAX request failed:", error);
        //                         Swal.fire(
        //                             "Error!",
        //                             "An error occurred during the request.",
        //                             "error"
        //                         );
        //                     });
        //             } else if (result.dismiss === Swal.DismissReason.cancel) {
        //                 // User clicked "No, cancel"
        //                 // Swal.fire('Cancelled', 'Your item is safe :)', 'info');
        //             }
        //         });
        //     });
        // }
    });
</script>
@include('layouts.flashMessage')
</body>

</html>
