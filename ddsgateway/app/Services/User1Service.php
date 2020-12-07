<?php

    namespace App\Services;
    use App\Traits\ConsumesExternalService;

    class User1Service{
        
    use ConsumesExternalService;
    /**
     * The base uri to consume the User1 Service
     * @var string
     */
    public $baseUri;
    
    /**
     * The secret to consume the User1 Service
     * @var string
     */
    public $secret;

    public function __construct(){
        $this->baseUri =config('services.users1.base_uri');
        $this->secret =config('services.users1.secret');
    }

    public function obtainUsers1()
    {
        return $this->performRequest('GET','/users');
    }
    public function addUsers1($data)
    {
        return $this->performRequest('POST', '/users', $data);
    }
    public function showUsers1($id){
        return $this->performRequest('GET', "/users/{$id}");
    }
    public function updateUsers1($data,$id)
    {
        return $this->performRequest('PUT', "/users/{$id}", $data);
    }
    public function deleteUsers1($id)
    {
        return $this->performRequest('DELETE', "/users/{$id}");
    }
}