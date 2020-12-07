<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser; //to standardized our code for api response
use Illuminate\Http\Request; // handling http request in lumen
use App\Services\User1Service; //user1 services

Class User1Controller extends Controller {
    use ApiResponser;
    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */
    public $user1Service;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User1Service $user1Service)
    {
        $this->user1Service = $user1Service;
    }

    public function index()
    {
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    public function addUser(Request $request)
    {
        return $this->successResponse($this->user1Service->addUsers1($request->all()));
    }

    public function showUser($id){
        return $this->successResponse($this->user1Service->showUsers1($id));
    }

    public function updateUser(Request $request, $id)
    {
        return $this->successResponse($this->user1Service->updateUsers1($request->all(),$id));
    }

    public function deleteUser($id)
    {
        return $this->successResponse($this->user1Service->deleteUsers1($id));
    }
}