<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderByDesc('id')->with(['medias'])->get();
        return $this->successResponse(UserResource::collection($users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        return $this->successResponse(UserResource::make($user->load(['medias'])),
            'کاربر مورد نظر ثبت شد',
            '201');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load(['blogs','products','medias','likes']);
        return $this->successResponse(UserResource::make($user));
    }
//////
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


}
