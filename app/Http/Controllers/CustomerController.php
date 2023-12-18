<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\Customers;
use App\Models\SellingAddress;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $CustomerArr = Customers::orderBy('id', 'desc')->get();
        return view('customers.index', compact('CustomerArr'));
    }

    public function XHRtable(Request $request): JsonResponse
    {
        if ($request->isMethod('post')) {
            $newArr = [];
            $select = [
                'name',
                'email',
                'phone',
                'currency',
                'website',
                'notes',
                'bank_name',
                'bank_branch',
                'bank_account_holder',
                'bank_account_number',
                'bank_ifsc',
                'profile_image'
            ];
            $ItemsArr = Customers::select($select)
                ->where('status', '1')
                ->where('id', decryptIt($request->id))
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();

            if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                // dd($ItemsArr);
                // foreach ($ItemsArr[0] as $key => $value) {
                //     $newArr[__(underscoreToSpace($key))] = __(ucfirst($value));
                // }
                return response()->json([
                    'status' => true,
                    'msg' => 'Customers get successfully!.',
                    'data' => $newArr,
                    'redirect' => '/',
                ]);
            }
        }
        abort(404);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        try {
            if ($request->isMethod('post')) {
                $newArr = [];
                $rules = [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users|max:255',
                    'phone' => 'required|min:10',
                    'currency' => 'required',
                    'website' => 'required',
                    'notes' => 'required',
                    'profile_image' => 'required',

                    'billing_name' => 'required',
                    'billing_address' => 'required',
                    'billing_country' => 'required',
                    'billing_city' => 'required',
                    'billing_state' => 'required',
                    'billing_pincode' => 'required',

                    'bank_name' => 'required',
                    'bank_branch' => 'required',
                    'bank_account_holder' => 'required',
                    'bank_account_number' => 'required',
                    'bank_ifsc' => 'required',
                ];

                $request->validate($rules);

                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'currency' => $request->currency,
                    'website' => $request->website,
                    'notes' => $request->notes,
                    'bank_name' => $request->bank_name,
                    'bank_branch' => $request->bank_branch,
                    'bank_account_holder' => $request->bank_account_holder,
                    'bank_account_number' => $request->bank_account_number,
                    'bank_ifsc' => $request->bank_ifsc,
                ];
                if ($request->hasFile('profile_image')) {
                    $slupload = Cloudinary::upload($request->file('profile_image')->getRealPath());
                    if ($slupload) {
                        $imageName = $slupload->getSecurePath();
                        $data['profile_image'] = $imageName;
                    }
                }
                // dd($data);
                $createdItem = Customers::create($data);
                $insertedId = $createdItem->id;

                if ($insertedId) {
                    $billing_data = [
                        'user_id' => $insertedId,
                        'name' => $request->billing_name,
                        'address' => $request->billing_address,
                        'country' => $request->billing_country,
                        'city' => $request->billing_city,
                        'state' => $request->billing_state,
                        'pincode' => $request->billing_pincode,
                        'similar' => $request->billing_similar ? 1 : 0
                    ];

                    BillingAddress::create($billing_data);

                    if ($request->billing_similar == 0) {
                        $selling_data = [
                            'user_id' => $insertedId,
                            'name' => $request->selling_name,
                            'address' => $request->selling_address,
                            'country' => $request->selling_country,
                            'city' => $request->selling_city,
                            'state' => $request->selling_state,
                            'pincode' => $request->selling_pincode
                        ];

                        SellingAddress::create($selling_data);
                    }
                }

                if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                    return response()->json([
                        'status' => true,
                        'msg' => 'Customer added successfully!.',
                        'redirect' => route('customers.index'),
                    ]);
                } else {
                    return redirect()
                        ->route('customers.index')
                        ->with(['success' => 'Customer added successfully!.']);
                }
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('Exception caught: ' . $e->getMessage());

            return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function status(Request $request)
    {
        try {
            if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                $id = $request->id;
                if ($id) {
                    $OrginalId = decryptIt($id);
                    $Cutomersitem = Customers::findOrFail($OrginalId);
                    $data = ['status' => $request->status];
                    $Cutomersitem->update($data);

                    if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                        return response()->json([
                            'status' => true,
                            'msg' => 'Customer updated successfully',
                            'redirect' => '',
                        ]);
                    }
                }
            } else {
                abort(304);
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('Exception caught: ' . $e->getMessage());

            return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                $id = $request->id;
                if ($id) {
                    $OrginalId = decryptIt($id);
                    $Cutomersitem = Customers::findOrFail($OrginalId);
                    $Cutomersitem->delete();

                    if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                        return response()->json([
                            'status' => true,
                            'msg' => 'Customer deleted successfully',
                            'redirect' => '',
                        ]);
                    }
                }
            } else {
                abort(304);
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error('Exception caught: ' . $e->getMessage());

            return response()->json(['status' => false, 'msg' => $e->getMessage()]);
        }
    }
}
