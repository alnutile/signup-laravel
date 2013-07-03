<?php

class Users extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

       //Check Passwords match
       $user = array(
            'password' => Input::get('password'),
            'username' => Input::get('username'),
            'company' => Input::get('company'),
            'firstname' => Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'email' => Input::get('email'),
       );

        $rules = array(
            'email' => array('unique:users', 'required'),
            'username' => array('unique:users','required'),
            'company' => 'required',
            'password' => array('required', 'confirmed'),
            'password_confirmation' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::to('signup')->withErrors($validator)
                ->withInput();
        }

       $passorig = $user['password'];
       $password = Hash::make($user['password']);
       $user['password'] = $password;
       $user = User::create($user);

        if (Auth::attempt(array('username' => $user['username'], 'password' => $passorig))) {

             if(Config::get('saas.steps') == 2) {
                return Redirect::to('signup/step2')
                    ->with('flash_notice', 'One more Step!');
             } else {
                return Redirect::to('profile')
                    ->with('flash_notice', 'You are successfully logged in.');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
     //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}