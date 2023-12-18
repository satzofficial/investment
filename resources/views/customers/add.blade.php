<x-app-layout>
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="card mb-0">
                <div class="card-body">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="content-page-header">
                            <h5>Add Customer</h5>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('customers.create') }}" id="myform" class="myform"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="billing_similar" id="billing_similar"
                                    class="billing_similar" value="">
                                <div class="form-group-item">
                                    <h5 class="form-title">Basic Details</h5>
                                    <div class="profile-picture">
                                        <div class="upload-profile">
                                            <div class="profile-img">
                                                <img id="blah" class="avatar" src="{{ dummyuserImg() }}"
                                                    alt="profile-img">
                                            </div>
                                            <div class="add-profile">
                                                {{-- <h5>Upload a New Photo</h5> --}}
                                                {{-- <span>Profile-pic.jpg</span> --}}
                                            </div>
                                        </div>
                                        <div class="img-upload">
                                            <label class="btn btn-upload">
                                                Choose image <input type="file" id="profile_image"
                                                    name="profile_image" accept="image/x-png,image/gif,image/jpeg">
                                            </label>
                                            <a class="btn btn-remove" id="changeImageBtn">Remove</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter Name"
                                                    name="name" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control"
                                                    placeholder="Enter Email Address" name="email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input type="text" id="mobile_code" class="form-control"
                                                    placeholder="Phone Number" name="phone" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Currency</label>
                                                <select class="select" name="currency" id="currency" required>
                                                    {{-- <option value="0">Select Currency</option> --}}
                                                    <option value="1">₹</option>
                                                    <option value="2">$</option>
                                                    <option value="3">£</option>
                                                    <option value="4">€</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Website</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Website Address" name="website"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Notes</label>
                                                <textarea class="form-control" placeholder="Enter Your Notes" name="notes" autocomplete="off" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-item">
                                    <div class="row align-items-end">
                                        <div class="col-md-6">
                                            <div class="billing-btn mb-2">
                                                <h5 class="form-title">Billing Address</h5>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Name"
                                                    name="billing_name" id="billing_name" autocomplete="off">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Enter Address 1"
                                                    name="billing_address" id="billing_address" autocomplete="off">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="input-block mb-3">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Country" name="billing_country"
                                                            id="billing_country" autocomplete="off">
                                                    </div>
                                                    <div class="input-block mb-3">
                                                        <label>City</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter City" name="billing_city"
                                                            id="billing_city" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="input-block mb-3">
                                                        <label>State</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter State" name="billing_state"
                                                            id="billing_state" autocomplete="off">
                                                    </div>
                                                    <div class="input-block mb-3">
                                                        <label>Pincode</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Pincode" name="billing_pincode"
                                                            id="billing_pincode" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="billing-btn">
                                                <h5 class="form-title mb-0">Shipping Address</h5>
                                                <a href="javascript:;" class="btn btn-primary copy_from_billing"
                                                    id="copy_from_billing">Copy from Billing</a>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Name"
                                                    name="selling_name" id="selling_name" autocomplete="off">
                                            </div>
                                            <div class="input-block mb-3">
                                                <label>Address </label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Address 1" name="selling_address"
                                                    id="selling_address" autocomplete="off">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="input-block mb-3">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Country" name="selling_country"
                                                            id="selling_country" autocomplete="off">
                                                    </div>
                                                    <div class="input-block mb-3">
                                                        <label>City</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter City" name="selling_city"
                                                            id="selling_city" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="input-block mb-3">
                                                        <label>State</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter State" name="selling_state"
                                                            id="selling_state" autocomplete="off">
                                                    </div>
                                                    <div class="input-block mb-3">
                                                        <label>Pincode</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Pincode" name="selling_pincode"
                                                            id="selling_pincode" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-customer customer-additional-form">
                                    <div class="row">
                                        <h5 class="form-title">Bank Details</h5>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Bank Name" autocomplete="off" name="bank_name"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Branch</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Branch Name" autocomplete="off"
                                                    name="bank_branch">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Account Holder Name</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Account Holder Name" autocomplete="off"
                                                    name="bank_account_holder">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>Account Number</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Account Number" autocomplete="off"
                                                    name="bank_account_number" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <div class="input-block mb-3">
                                                <label>IFSC</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter IFSC Code" autocomplete="off" name="bank_ifsc"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-customer-btns text-end">
                                    <a href="{{ route('customers.index') }}" class="btn customer-btn-cancel">Back</a>
                                    <button class="btn customer-btn-save">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document
            .getElementById("profile_image")
            .addEventListener("change", function(event) {
                const fileInput = event.target;
                const file = fileInput.files[0];

                if (file) {
                    // Use FileReader to read the image file
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        // Set the source of the image preview to the data URL
                        document.getElementById("blah").src = e.target.result;
                    };

                    // Read the image file as a data URL
                    reader.readAsDataURL(file);
                }
            });

        const imageElement = document.getElementById('blah');
        const buttonElement = document.getElementById('changeImageBtn');

        function changeImage() {
            // Set the new image source
            imageElement.src = '{{ dummyuserImg() }}';
        }
        buttonElement.addEventListener('click', changeImage);



        const billingNameInput = document.getElementById('billing_name');
        const billingAddressInput = document.getElementById('billing_address');
        const billingCountryInput = document.getElementById('billing_country');
        const billingStateInput = document.getElementById('billing_state');
        const billingCityInput = document.getElementById('billing_city');
        const billingPincodeInput = document.getElementById('billing_pincode');


        const sellingNameInput = document.getElementById('selling_name');
        const sellingAddressInput = document.getElementById('selling_address');
        const sellingCountryInput = document.getElementById('selling_country');
        const sellingStateInput = document.getElementById('selling_state');
        const sellingCityInput = document.getElementById('selling_city');
        const sellingPincodeInput = document.getElementById('selling_pincode');


        const copyButton = document.getElementById('copy_from_billing');

        // // Add a click event listener to the copy button
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();

            document.getElementById('billing_similar').value = 1;
            // Copy the value from billing address to shipping address
            if (billingNameInput && billingNameInput.value !== null || billingNameInput.value !== undefined) {
                sellingNameInput.value = billingNameInput.value;
            }
            if (billingAddressInput && billingAddressInput.value !== null || billingAddressInput.value !==
                undefined) {
                sellingAddressInput.value = billingAddressInput.value;
            }
            if (billingCountryInput && billingCountryInput.value !== null || billingCountryInput.value !==
                undefined) {
                sellingCountryInput.value = billingCountryInput.value;
            }
            if (billingStateInput && billingStateInput.value !== null || billingStateInput.value !== undefined) {
                sellingStateInput.value = billingStateInput.value;
            }
            if (billingCityInput && billingCityInput.value !== null || billingCityInput.value !== undefined) {
                sellingCityInput.value = billingCityInput.value;
            }
            if (billingPincodeInput.value !== null || billingPincodeInput.value !== undefined) {
                sellingPincodeInput.value = billingPincodeInput.value;
            }
        });
    </script>
    <!-- /Page Wrapper -->
</x-app-layout>
