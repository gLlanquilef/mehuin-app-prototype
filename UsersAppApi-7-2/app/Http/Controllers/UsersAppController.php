<?php

namespace App\Http\Controllers;

use App\Models\UsersApp;
use App\Services\UsersAppService;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UsersAppController extends Controller
{
    use ApiResponser;
    public $timestamps = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

    }

    /**
     * Return Users App List.
     * @return JsonResponse
     */
    public function index(){
        //TODO consulta rest a los demas servicios con informacion del usuario
        return $this->successResponse(UsersApp::all());
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

        $username = UsersApp::create($request->all());

        return $this->successResponse($username, Response::HTTP_CREATED);
    }

    /**
     * Show an specific Users App.
     * @param $username
     * @return JsonResponse
     */
    public function show($username){
        //TODO consulta rest a los demas servicios con informacion del usuario

        return $this->successResponse(UsersApp::findOrFail($username));
    }

    /**
     * Update an specific Users App.
     * @param Request $request
     * @param $username
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $username){
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

        $username = UsersApp::findOrFail($username);

        $username->fill($request->all());

        if($username->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $username->save();
        return $this->successResponse($username);
    }

    /**
     * Delete an specific Users App.
     * @param $username
     * @return JsonResponse
     */
    public function destroy($username){
        //TODO consulta rest a los demas servicios con informacion del usuario
        $username = UsersApp::findOrFail($username);

        $username->delete();

        return $this->successResponse($username);
    }
}
