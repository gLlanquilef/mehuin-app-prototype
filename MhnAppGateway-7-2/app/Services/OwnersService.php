<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class OwnersService
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
        $this->baseUri = config('services.owners.base_uri');
        $this->secret = config('services.owners.secret');
    }

    /**
     * Get the full list of owner from the authors service
     * @return string
     */
    public function obtainOwners()
    {
        return $this->performRequest('GET', '/owners');
    }

    /**
     * Create an instance of owner using the authors service
     * @param $data
     * @return string
     */
    public function createOwner($data)
    {
        return $this->performRequest('POST', '/owners', $data);
    }

    /**
     * Get a single author from the owner service
     * @param owner
     * @return string
     */
    public function obtainOwner($owner)
    {
        return $this->performRequest('GET', "/owners/{$owner}");
    }

    /**
     * Edit a single author from the owner service
     * @param $data
     * @param owner
     * @return string
     */
    public function editOwner($data, $owner)
    {
        return $this->performRequest('PUT', "/owners/{$owner}", $data);
    }

    /**
     * Remove a single owner from the authors service
     * @param owner
     * @return string
     */
    public function deleteOwner($owner)
    {
        return $this->performRequest('DELETE', "/owners/{$owner}");
    }
}
