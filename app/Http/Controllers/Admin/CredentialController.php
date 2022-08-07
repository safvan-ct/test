<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Account;
use App\Models\Admin\Credential;
use Illuminate\Http\Request;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {


        $account = Account::find($id);
        $count = $account->count;

        $email = $request->Email;
        $epass1=$request->Epassword;

        $username=$request->username;

        $pass1= $request->password;

        $email_password="";

        foreach($epass1 as $ep)
        {

            $password1="mindjosafansimiranjithnideeshmelvinsnehagame";
            $encrypted_string=openssl_encrypt($ep,"AES-128-ECB",$password1);
            $email_password.= $encrypted_string.",";
        }
        //***************************************
        $stream_pass="";
        foreach($pass1 as $sp)
        {

            $password2="gamesafanjosimiranjithnideeshmelvinsnehamind";
            $encrypted_string1=openssl_encrypt($sp,"AES-128-ECB",$password2);

            $stream_pass.= $encrypted_string1.",";
        }

        $epass= explode(',', $email_password);
        $pass=explode(',', $stream_pass);

        $i=0;

        foreach($email as $n) {

            $count = $count+1;
            Credential::create([
                'pid' => $id,
                'email' => $email[$i],
                'email_password' => $epass[$i],
                'stream_username' => $username[$i],
                'stream_password' => $pass[$i],
                'send'=>'no'

            ]);

        }

        $account->update([
            'credential' => 'Yes',
            'count' => $count,

        ]);



        return back()->with('success', 'Added Successfully');

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
        $Crendital = Credential::find($id);

        Credential::destroy($Crendital->id);

        return redirect(route('accounts.index'))->with('success', 'Deleted Successfully');
    }
}
