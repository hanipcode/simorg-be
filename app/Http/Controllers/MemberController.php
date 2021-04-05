<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return MemberResource::collection(Member::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'full_name' => 'required',
            'gender' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'origin_address' => 'required',
            'address' => 'required',
            'blood_type' => 'required',
            'university' => 'required',
            'faculty' => 'required',
            'major' => 'required',
            'email' => 'required',
            'photo' => 'required|image',
            'signature' => 'required|image'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $member = new Member($validator->validated());
        $photo_name = 'photo_' . $request->user_id . '.' . $request->file('photo')->getClientOriginalExtension();
        $signature_name = 'signature_' . $request->user_id . '.' . $request->file('signature')->getClientOriginalExtension();
        $photo = $request->file('photo')->storeAs('img/photo', $photo_name);
        $signature = $request->file('signature')->storeAs('img/signature', $signature_name);
        $member->photo = $photo;
        $member->signature = $signature;
        $member->save();
        return new MemberResource($member);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //6
        return new MemberResource(Member::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'full_name' => '',
            'gender' => '',
            'birthplace' => '',
            'birthdate' => '',
            'origin_address' => '',
            'address' => '',
            'blood_type' => '',
            'university' => '',
            'faculty' => '',
            'major' => '',
            'email' => '',
            'photo' => 'image',
            'signature' => 'image'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $member = Member::findOrFail($id);
        $member->update($request->all());
        if ($request->file('photo')) {
            $photo_name = 'photo_' . $request->user_id . '.' . $request->file('photo')->getClientOriginalExtension();
            $photo = $request->file('photo')->storeAs('img/photo', $photo_name);
            $member->photo = $photo;
        }
        if ($request->file('signature')) {
            $signature_name = 'signature_' . $request->user_id . '.' . $request->file('signature')->getClientOriginalExtension();
            $signature = $request->file('signature')->storeAs('img/signature', $signature_name);
            $member->signature = $signature;
        }
        $member->save();
        return new MemberResource($member);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
