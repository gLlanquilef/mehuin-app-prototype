<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class OwnerController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return Owners List.
     * @return JsonResponse
     */
    public function index(){
        return $this->successResponse(Owner::all());
    }

    /**
     * Create an instance of Owner.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'mail' => 'required|max:255',
        ];

        $this->validate($request, $rules);

        $owner = Owner::create($request->all());

        return $this->successResponse($owner, Response::HTTP_CREATED);
    }

    /**
     * Show an specific Owner.
     * @param $owner
     * @return JsonResponse
     */
    public function show($owner){
        return $this->successResponse(Owner::findOrFail($owner));
    }

    /**
     * Update an specific Owner.
     * @param Request $request
     * @param $owner
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $owner){
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'address' => 'max:255',
            'phone' => 'max:255',
            'mail' => 'max:255',
        ];
        $this->validate($request, $rules);

        $owner = Owner::findOrFail($owner);

        $owner->fill($request->all());

        if($owner->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $owner->save();
        return $this->successResponse($owner);
    }

    /**
     * Delete an specific Owner.
     * @param $owner
     * @return JsonResponse
     */
    public function destroy($owner){
        $owner = Owner::findOrFail($owner);

        $owner->delete();

        return $this->successResponse($owner);
    }
}
