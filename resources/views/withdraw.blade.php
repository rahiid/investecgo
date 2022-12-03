@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/withdraw.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#ammount").on("input", function(){
                // Print entered value in a div box
                var num = $(this).val();
                var minus = (10/100) * parseInt(num);
                var result = num - minus;

                if(isNaN(parseInt(num))) {
                var result = 0;
                $("#change_ammount").text(result);
                }

                else{
                    $("#change_ammount").text(result);
                }



            });

        });
    </script>

@endsection


@section('content')
    

<section class="user-section">
    <div class="user-sidebar">

            <div class="profile-userpic">
                <img src="/image/avatar.svg" class="img-responsive" alt="Userpic">



                @if(Auth::check())
                <h5>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h5>
                <h6>#{{{ isset(Auth::user()->name) ? Auth::user()->username : Auth::user()->email }}}</h6>
                <p style="color: #3361FF; font-weight:700;">Balance: <span>{{{ isset(Auth::user()->name) ? Auth::user()->wallet : Auth::user()->email }}}$</span></p>
                @else
                <h5> Name </h5>
                <h5> Id </h5>
                <p style="color: #3361FF; font-weight:700;">Balance: <span> 00$</span></p>
                @endif


            </div>

            <div class="invest-now-button">
                <a href="/invest" class="btn btn-sm">INVEST NOW</a>
            </div>


            <div class="sidebar-bottom">

                <div class="sidebar-items">
                    <i class="fas fa-user fa-lg"></i>
                    <a  href="/user" class="sidebar-links stretched-link"><h5>Profile</h5></a>
                </div>
                <div class="sidebar-items">
                    <i class="fas fa-wallet fa-lg"></i>

                    <a href="/deposit" class="sidebar-links stretched-link"><h5>Deposit</h5></a>
                </div>
                <div class="sidebar-items">
                    <i class="fas fa-cart-arrow-down fa-lg"></i>

                    <a href="/balancetransfer" class="sidebar-links stretched-link"><h5>Balance Transfer</h5></a>
                </div>
                <div class="sidebar-items" id="u1">
                    <i class="fas fa-money-check-alt fa-lg"></i>

                    <a href="/withdraw" class="sidebar-links stretched-link"><h5>Withdraw</h5></a>
                </div>
                <div class="sidebar-items">
                    <i class="fas fa-user-plus fa-lg"></i>

                    <a href="/referrer" class="sidebar-links stretched-link"><h5>Referrer</h5></a>
                </div>
                <div class="sidebar-items">
                    <i class="fas fa-sign-out-alt fa-lg"></i>
                    <a class="sidebar-links stretched-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <h5>LogOut</h5>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            </div>

    </div>

    <div class="user-info">
        <div class="withdraw user-inner" id="scrollbar">

            <form method="POST" class="withdraw-control" name="withdraw-form" action="withdraw" onsubmit="withdrawmoney.disabled = true; return true;">
                @csrf

                 <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                 <input type="hidden" name="username" value="{{ Auth::user()->username }}">

                <div class="withdraw-inner form-group">

                        <label for="btc">
                        <input  type="radio" id="btc" checked name="payment_type" value="BTC" onclick='document.getElementById("addmoney-number").innerHTML = "BTC Wallet"'>
                        <img src="/image/btc.png" alt="Btc">
                        </label>

                        <label for="trx">
                        <input  type="radio" id="trx" name="payment_type" value="TRX" onclick='document.getElementById("addmoney-number").innerHTML = "TRX Wallet"'>
                        <img src="/image/trx.png" alt="Trx">
                        </label>

                        <label for="doge">
                        <input  type="radio" id="doge" name="payment_type" value="DOGE" onclick='document.getElementById("addmoney-number").innerHTML = "DOGE Wallet"'>
                        <img src="/image/doge.jpg" alt="Doge">
                        </label>

                        <label for="usdt">
                        <input  type="radio" id="usdt" name="payment_type" value="USDT" onclick='document.getElementById("addmoney-number").innerHTML = "USDT Wallet"'>
                        <img src="/image/usdt.png" alt="Usdt">
                        </label>

                </div>
            <div class="withdraw-text">
                <h5 id="addmoney-number">BTC Wallet</h5>
                <p style="text-align: center">
                    <strong style="color: #3361FF">INVESTMANIA Money Withdraw</strong> <br> <br>
                    <strong style="color: red;">Please, Select your account type first from top.</strong>
                     <br>
                    <br>

                </p>
            </div>


                <div class="withdraw-items" >

                    <div class="form-group" >
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref" >Ammount</label> <br>
                        <input class="withdraw-control " type="number" step="0.00001" id="ammount" name="ammount" min="10" max="{{ Auth::user()->wallet }}" style="width: 60%;" required>
                        <small  class="form-text text-muted">10% charge will be applied to this Transaction.</small>
                    </div>

                    <h6>Ammount  will be withdrawn: <span id="change_ammount"></span></h6>

                    <div class="form-group">
                        <label for="walletid">OWN Wallet Address </label> <br>
                        <input class="withdraw-control " type="text" id="walletid" name="walletid" style="width: 60%;" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="withdrawmoney">Withdraw</button>
                </div>
              </form>


              <div class="withdraw-table"  >
                <table class="table table-responsive-md table-bordered" style="width:80%;">


                    @if(Auth::check())
                    @if (count($withdraw))

                    <thead>
                        <tr>
                          <th scope="col">Serial No.</th>
                          <th scope="col">Ammount</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>

                        </tr>
                      </thead>
                      <tbody>


                        @foreach ($withdraw as $withdraw)
                            <tr>


                                <td>{{$withdraw['id']}}</td>
                                <td>{{$withdraw['ammount']}}</td>
                                <td>{{ Str::limit($withdraw['created_at'], 10) }}</td>
                                <td>{{$withdraw['status']}}</td>

                            </tr>

                        @endforeach

                      @endif

                      @else
                      <ht style="color: #7C4DFF;">No Data to Show!!!</ht>
                      @endif



                    </tbody>
                  </table>
            </div>

        </div>

        </div>



</section>


@endsection
