<?php

namespace App\Http\Controllers;
use App\RegisterClient;
use Illuminate\Http\Request;
use App\Invest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

class InvestController extends Controller
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
            //$wallet['wallet'] = DB::table('topups')->where('user_id','=', $id)->get()->toArray();

            $invest = Invest::all()->toArray();
            $invest = collect($invest)->where('userid', $user_id)->all();
            //$wallet = Addcash::all()->toArray();

            //return $wallet['user_id'] == 1;
            return view('/invest', compact('invest'));

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
        $investorid = Auth::user()->id;

        $checkinitialinvest =  DB::table('users')->where('id', $investorid)->value('invest');


        if ($checkinitialinvest == '0') {

           $userlevel =  DB::table('users')->where('id', $investorid)->value('hashl');
           $userparentid =  DB::table('users')->where('id', $investorid)->value('hashd');
           $userfistinvestammount = $request->input('ammount');
           $parentlevel =  DB::table('users')->where('id', $userparentid)->value('hashl');

            $end = 8;
            $level = 0;





          while($userparentid != '0'){

            if($parentlevel == $end || $parentlevel > $end){

                break;
             }



            if($userparentid == '0'){

                break;
             }




            $level =  $level + 1;

            if($level=='1'){

                $level1 = '0.07';
                $bonusammount = ($userfistinvestammount * $level1);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }

            if($level=='2'){

                $level2 = '0.05';
                $bonusammount = ($userfistinvestammount * $level2);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }
            if($level=='3'){

                $level3 = '0.03';
                $bonusammount = ($userfistinvestammount * $level3);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }

            if($level=='4'){

                $level4 = '0.02';
                $bonusammount = ($userfistinvestammount * $level4);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }

            if($level=='5'){

                $level5 = '0.01';
                $bonusammount = ($userfistinvestammount * $level5);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }

            if($level=='6'){

                $level6 = '0.01';
                $bonusammount = ($userfistinvestammount * $level6);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }

            if($level=='7'){

                $level7 = '0.01';
                $bonusammount = ($userfistinvestammount * $level7);

                $beforebonuswallet = DB::table('users')->where('id', $userparentid)->value('wallet');

                $afterbonuswallet = ($bonusammount + $beforebonuswallet);

                DB::table('users')->where('id', $userparentid)->update(array('wallet' => $afterbonuswallet));

            }


            $userparentid =  DB::table('users')->where('id', $userparentid)->value('hashd');
          }


        }



        $Invest = new Invest;
        $Invest->userid = $request->userid;
        $Invest->ammount = $request->ammount;
        $Invest->save();


        $remail = Auth::user()->email;
        $rname = Auth::user()->name;

        $inputs = [
            'ammount'=> $request->input('ammount'),
            'uname'=> $request->input('username')
        ];

        Mail::send('emails.investmail',$inputs,function($mail) use($inputs,$remail,$rname){

            $mail->from('info@investecgo.com',"INVESTECGO",)
            ->to($remail,$rname)
            ->subject("INVESTECGO Money Invest");

        });


        $investammount = $request->input('ammount');

        $pastinvestamm = DB::table('users')->where('id', $investorid)->value('invest');
        $newinvestamm = ($investammount + $pastinvestamm);
        DB::table('users')->where('id', $investorid)->update(array('invest' => $newinvestamm));

        $pastbalance = DB::table('users')->where('id', $investorid)->value('wallet');
        $newbalance = ($pastbalance - $investammount);
        DB::table('users')->where('id', $investorid)->update(array('wallet' => $newbalance));


        return redirect('/invest');
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
