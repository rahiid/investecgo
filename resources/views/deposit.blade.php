@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/deposit.css">
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
                <div class="sidebar-items" id="u1">
                    <i class="fas fa-wallet fa-lg"></i>

                    <a href="/deposit" class="sidebar-links stretched-link"><h5>Deposit</h5></a>
                </div>
                <div class="sidebar-items">
                    <i class="fas fa-cart-arrow-down fa-lg"></i>
                    <a href="/balancetransfer" class="sidebar-links stretched-link"><h5>Balance Transfer</h5></a>
                </div>
                <div class="sidebar-items">
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
        <div class="addmoney user-inner" id="scrollbar">

            <form method="POST" class="addmoney-control" name="addmoney-form" action="deposit"  onsubmit="depositmoneytoacc.disabled = true; return true;">

            @csrf

            @if(Auth::check())
                 <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                 <input type="hidden" name="username" value="{{ Auth::user()->name }}">
            @else
            <input type="hidden" name="userid" value="User Not Logged In!!">
            @endif
            <div class="addmoney-inner form-group">

                    <label for="btc">
                    <input  type="radio" id="btc" name="payment_type" value="BTC" checked onclick='document.getElementById("addmoney-number").innerHTML = "BTC Address: bc1q0aluck5l3aa5q3qhl0m5t0wnke7zttnj92943j"' required>
                    <img class="img-responsive" src="/image/btc.png" alt="Btc">
                    </label>

                    <label for="trx">
                    <input  type="radio" id="trx" name="payment_type" value="TRX" onclick='document.getElementById("addmoney-number").innerHTML = "TRX Address: TCUjGccwiYzGjQgEWu12bmdGFu8CFMjF89"' required>
                    <img class="img-responsive" src="/image/trx.png" alt="Trx">
                    </label>

                    <label for="doge">
                    <input  type="radio" id="doge" name="payment_type" value="DOGECOIN" onclick='document.getElementById("addmoney-number").innerHTML = "DOGECOIN Address: DLP7cJ5V2VAGGEbgJRRcDGmYhccaM6TVKH"' required>
                    <img class="img-responsive" src="/image/doge.jpg" alt="Doge">
                    </label>

                    <label for="usdt">
                    <input  type="radio" id="usdt" name="payment_type" value="USDT" onclick='document.getElementById("addmoney-number").innerHTML = "USDT Address: TCUjGccwiYzGjQgEWu12bmdGFu8CFMjF89"' required>
                    <img  class="img-responsive" src="/image/usdt.png" alt="Usdt">
                    </label>

            </div>
            <div class="addmoney-text">
                <h5 id="addmoney-number">BTC Address:  bc1q0aluck5l3aa5q3qhl0m5t0wnke7zttnj92943j</h5>
                <p style="text-align: center;">
                    <strong style="color: #3361FF;">INVESTMANIA Money Deposit</strong> <br>
                    <strong style="color:red;">*Please, Choose account type first.*</strong> <br>  <br>

                </p>
            </div>


                <div class="addmoney-items" >



                    <div class="form-group">
                        <label for="walletid">OWN Wallet Address</label> <br>
                        <input class="addmoney-control addmoney-input" type="text" id="walletid" name="walletid" style="width: 60%;" required>
                    </div>

                    <div class="form-group" >
                        <label class="my-1 mr-2 addmoney-input" for="inlineFormCustomSelectPref" >Ammount</label> <br>
                        <input class="addmoney-control" type="number" step="0.00001" id="ammount" name="ammount" min="10" style="width: 60%;" required>
                        <small  class="form-text text-muted">10% charge will be applied to this Transaction.</small>
                    </div>

                    <h6>Ammount you will recieve: <span id="change_ammount"></span></h6>

                    <button type="submit" name="depositmoneytoacc" class="btn btn-primary">Deposit</button>
                </div>
              </form>



              <div class="deposit-table">
                <table class="table table-responsive-md table-bordered" style="width:80%;">


                    @if(Auth::check())
                    @if (count($deposit))

                    <thead>
                        <tr>
                          <th scope="col">Serial No.</th>
                          <th scope="col">Ammount</th>
                          <th scope="col">Date</th>
                          <th scope="col">Status</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($deposit as $deposit)
                            <tr>


                                <td>{{$deposit['id']}}</td>
                                <td>{{$deposit['ammount']}}</td>
                                <td>{{ Str::limit($deposit['created_at'], 10) }}</td>
                                <td>{{$deposit['status']}}</td>

                            </tr>

                        @endforeach


                      @endif


                      @else

                      <h1 style="color: #7C4DFF;">No Data to Show!!!</h1>

                      @endif



                    </tbody>
                  </table>
            </div>

        </div>

    </div>
</section>



@endsection
