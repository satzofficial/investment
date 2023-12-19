<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnitsRequest;
use App\Http\Requests\UpdateUnitsRequest;
use App\Models\Units;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageView = 'units';
        $UnitsArr = Units::orderBy('id', 'desc')->get();
        return view('units.index', compact('UnitsArr', 'pageView'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitsRequest $request)
    {
        $data = ['name' => $request->name, 'symbol' => $request->symbol];
        Units::create($data);
        if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
            return response()->json([
                'status' => true,
                'msg' => 'Units added successfully!.',
                'redirect' => route('units.index'),
            ]);
        } else {
            return redirect()
                ->route('units.index')
                ->with(['success' => 'Units added successfully!.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Units $units, Request $request, string $id)
    {


        if ($id) {
            $unit = Units::where('id', $id)->first();
            if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                return response()->json([
                    'status' => true,
                    'msg' => 'Units added successfully!.',
                    'data' => $unit,
                ]);
            } else {
                return redirect()
                    ->route('units.index')
                    ->with(['success' => 'Units added successfully!.']);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitsRequest $request, Units $units)
    {
        $id = decryptIt($request->id);
        if ($id) {
            $data = ['name' => $request->name, 'symbol' => $request->symbol];
            Units::where('id', $id)->update($data);
            if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                return response()->json([
                    'status' => true,
                    'msg' => 'Units added successfully!.',
                    'redirect' => route('units.index'),
                ]);
            } else {
                return redirect()
                    ->route('units.index')
                    ->with(['success' => 'Units added successfully!.']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Units $units, Request $request)
    {
        try {
            if ($request->header('X-Requested-With') === 'XMLHttpRequests') {
                $id = $request->id;
                if ($id) {
                    $OrginalId = decryptIt($id);
                    $Cutomersitem = Units::findOrFail($OrginalId);
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