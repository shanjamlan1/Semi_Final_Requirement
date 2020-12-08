<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserJob;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;

Class UserController extends Controller {
    use ApiResponser;
    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    //return all users
    public function index(){
        $users =  User::all();
        return $this->successResponse($users);
    }

    //show user
    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return $this->successResponse($user);
    }

    //create new users
    public function addUser(Request $request){
        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20',
            'jobid' => 'required|numeric|min:1|not_in:0',
        ];

        $this->validate($request,$rules);
        // validate if Jobid is found in the table tbluserjob
        $userjob = UserJob::findOrFail($request->jobid);
        $user = User::create($request->all());
        return $this->successResponse($user,Response::HTTP_CREATED);
    }

    //update user
    public function updateUser(Request $request, $id)
    {
        $rules = [
            'username' => 'max:20',
            'password' => 'max:20',
            'jobid' => 'required|numeric|min:1|not_in:0',
        ];

        // validate if Jobid is found in the table tbluserjob
        $this->validate($request, $rules);
        $userjob = UserJob::findOrFail($request->jobid);
        $user = User::findOrFail($id);

        $user->fill($request->all());

        // if no changes happen
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->successResponse($user);
    }

    //delete user
    public function deleteUser($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return $this->deleteSuccess($user);
    }
}
