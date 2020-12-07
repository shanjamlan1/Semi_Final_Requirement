<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser; //to standardized our code for api response
use Illuminate\Http\Request; // handling http request in lumen
use App\Services\User2Service; //user2 services

Class User2Controller extends Controller {
    use ApiResponser;
    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */
    public $user2Service;
    /**
     * Create a new controller instance
     * @return void
     */
    public function __construct(User2Service $user2Service)
    {
        $this->user2Service = $user2Service;
    }

    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    public function addUser(Request $request)
    {
        return $this->successResponse($this->user2Service->addUsers2($request->all()));
    }

    public function showUser($id){
        return $this->successResponse($this->user2Service->showUsers2($id));
    }

    public function updateUser(Request $request, $id)
    {
        return $this->successResponse($this->user2Service->updateUsers2($request->all(),$id));
    }

    public function deleteUser($id)
    {
        return $this->successResponse($this->user2Service->deleteUsers2($id));
    }
}