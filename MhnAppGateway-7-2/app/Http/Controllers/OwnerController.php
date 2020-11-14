<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Services\OwnersService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class OwnerController extends Controller
{
    use ApiResponser;

    public $ownersService;

    /**
     * Create a new controller instance.
     *
     * @param OwnersService $ownersService
     */
    public function __construct(OwnersService $ownersService)
    {
        $this->ownersService = $ownersService;
    }

    /**
     * Return Owner App List.
     * @return JsonResponse
     */
    public function index(){
        //TODO consulta rest a los demas servicios con informacion del usuario
        return $this->successResponse($this->ownersService->obtainOwners());
    }

    /**
     * Create an instance of Users App.
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request){
        //TODO consulta rest a los demas servicios con informacion del usuario
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:255|in:male,female',
            'address' => 'max:255',
            'phone' => 'max:255',
            'password' => 'max:255',
            'mail' => 'max:255',
            'type' => 'max:255|in:customer,owner,developer',
        ];

        $this->validate($request, $rules);
        $request.
        $owner = Owner::create($request->all());

        return $this->successResponse($owner, Response::HTTP_CREATED);
    }

    /**
     * Show an specific Users App.
     * @param $owner
     * @return JsonResponse
     */
    public function show($owner){
        //TODO consulta rest a los demas servicios con informacion del usuario

        return $this->successResponse(Owner::findOrFail($owner));
    }

    /**
     * Update an specific Users App.
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
            'password' => 'max:255',
            'mail' => 'max:255',
            'type' => 'max:255|in:customer,owner,developer',
        ];
        $this->validate($request, $rules);

        $owner = UsersApp::findOrFail($owner);

        $owner->fill($request->all());

        if($owner->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $owner->save();
        return $this->successResponse($owner);
    }

    /**
     * Delete an specific Users App.
     * @param $owner
     * @return JsonResponse
     */
    public function destroy($owner){
        //TODO consulta rest a los demas servicios con informacion del usuario
        $owner = UsersApp::findOrFail($owner);

        $owner->delete();

        return $this->successResponse($owner);
    }
}
