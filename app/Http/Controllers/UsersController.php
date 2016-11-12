<?php

namespace App\Http\Controllers;

use Uuid;
use App\User;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Transformers\userTransformer;
use App\Http\Requets;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    use Helpers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return response()->json(User::all());
//        return $this->response->array(['id'=>1]);
//        return $this->response->collection(User::all(), new UserTransformer());
        return $this->response->paginator(User::paginate(10), new UserTransformer());
    }

    /**
     * @param CreateUserRequest $request
     * @return \Dingo\Api\Http\Response
     */
    public function store(Requests\CreateUserRequest $request)
    {
        $data = $request->except('password_confirmation');
        $data['password'] = bcrypt($data['password']);
        $data['uuid'] = Uuid::generate(4)->string;
        $user = User::create($data);
        return $this->response->item($user, new UserTransformer());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
