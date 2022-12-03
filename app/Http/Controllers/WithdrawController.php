<?php

namespace App\Http\Controllers;
use App\RegisterClient;
use Illuminate\Http\Request;
use App\Withdraw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $user_id = Auth::user()->id;

            $withdraw = Withdraw::all()->toArray();
            $withdraw = collect($withdraw)->where('userid', $user_id)->all();

            return view('/withdraw', compact('withdraw'));

        }

        return Redirect::route('login')->withInput()->with('errmessage', 'Please Login to access restricted area.');
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
    public function store(Request $request)
    {
        $Withdraw = new Withdraw;
        $Withdraw->userid = $request->userid;
        $Withdraw->payment_type = $request->payment_type;
        $Withdraw->walletid = $request->walletid;
        $Withdraw->ammount = $request->ammount;
        $Withdraw->save();



        $remail = Auth::user()->email;
        $rname = Auth::user()->name;

        $inputs = [
            'wallet_type'=> $request->input('payment_type'),
            'walletid'=> $request->input('walletid'),
            'ammount'=> $request->input('ammount'),
            'uname'=> $request->input('username')
        ];

        Mail::send('emails.withdrawmail',$inputs,function($mail) use($inputs,$remail,$rname){

            $mail->from('info@investecgo.com',"INVESTECGO",)
            ->to($remail,$rname)
            ->subject("INVESTECGO Withdraw Balance");

        });


        $wusername = $request->input('username');
        $withdrawammount = $request->input('ammount');

        $wacc = DB::table('users')->where('username', $wusername)->value('wallet');
        $newacc =  ($wacc - $withdrawammount);
        DB::table('users')->where('username', $wusername)->update(array('wallet' => $newacc));



        return redirect('/user');
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
