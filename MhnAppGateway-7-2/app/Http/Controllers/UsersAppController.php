<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Services\UsersAppService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UsersAppController extends Controller
{
    use ApiResponser;
    public $usersAppService;

    /**
     * Create a new controller instance.
     *
     * @param UsersAppService $usersAppService
     */
    public function __construct(UsersAppService $usersAppService)
    {
        $this->usersAppService = $usersAppService;
    }

    /**
     * Return Users App List.
     * @return JsonResponse
     */
    public function index(){
        //TODO consulta rest a los demas servicios con informacion del usuario
        return $this->successResponse($this->usersAppService->obtainUsersApp());
    }

    /**
     * Create an instance of Users App.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){

        return $this->successResponse($this->usersAppService->createUserApp($request->all()), Response::HTTP_CREATED);
    }

}
