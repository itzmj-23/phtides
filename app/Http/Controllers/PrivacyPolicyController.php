<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrivacyPolicyRequest;
use App\Http\Requests\UpdatePrivacyPolicyRequest;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrivacyPolicyController extends Controller
{
    public function __construct()
    {

    }


    public function index()
    {
        $data = PrivacyPolicy::get();
//        return view('privacy_policy.privacy_policy');
        return view('privacy_policy.index', [
            'data' => $data,
        ]);
    }


    public function create()
    {
        return view('privacy_policy.create');
    }


    public function store(StorePrivacyPolicyRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $data = PrivacyPolicy::create($validated);

            if ($data) {
                DB::commit();

                toastr()->success('Privacy Policy successfully added!', 'Added');
                return redirect()->route('privacyPolicy.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            toastr()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }


    public function show()
    {
        $data = PrivacyPolicy::get()->first();

        return view('privacy_policy.show', [
            'data' => $data,
        ]);
    }


    public function edit($id)
    {
        $data = PrivacyPolicy::find($id);

        return view('privacy_policy.edit', [
            'data' => $data,
        ]);
    }


    public function update(UpdatePrivacyPolicyRequest $request, $id)
    {
//        dd($request->all());
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $data = PrivacyPolicy::where('id', $id)->update($validated);

            if ($data) {
                DB::commit();

                toastr()->success('Privacy Policy successfully updated!', 'Updated');
                return redirect()->route('privacyPolicy.index');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            toastr()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }


}
