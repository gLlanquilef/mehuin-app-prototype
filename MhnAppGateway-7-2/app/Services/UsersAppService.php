<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class UsersAppService
{
    use ConsumesExternalService;

    /**
     * The base uri to be used to consume the authors service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to be used to consume the authors service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.usersApp.base_uri');
        $this->secret = config('services.usersApp.secret');
    }

    /**
     * Get the full list of UsersApp from the UsersApp service
     * @return string
     */
    public function obtainUsersApp()
    {
        return $this->performRequest('GET', '/usersApp');
    }

    /**
     * Create an instance of User app from the UsersApp service
     * @param $data
     * @return string
     */
    public function createUserApp($data)
    {
        return $this->performRequest('POST', '/usersApp', $data);
    }

    /**
     * Get a single User app from the UsersApp service
     * @param $userName
     * @return string
     */
    public function obtainUserApp($userName)
    {
        return $this->performRequest('GET', "/usersApp/{$userName}");
    }

    /**
     * Edit a single User app from the UsersApp service
     * @param $data
     * @param $userApp
     * @return string
     */
    public function editUserApp($data, $userApp)
    {
        return $this->performRequest('PUT', "/usersApp/{$userName}", $data);
    }

    /**
     * Remove a single User app from the UsersApp service
     * @param $userName
     * @return string
     */
    public function deleteUserApp($userName)
    {
        return $this->performRequest('DELETE', "/usersApp/{$userName}");
    }
}
