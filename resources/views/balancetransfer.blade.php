@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/balancetransfer.css">

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
                <div class="sidebar-items" id="u1">
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
        <div class="user-inner"  id="scrollbar">
            <div class="balancetransfer">
                <h4>Transfer your currency to another <span >INVESTMANIA</span>  Account.</h4>

            <form method="POST" class="balancetransfer-inner" name="balancetransfer" action="balancetransfer"  onsubmit="transfermoney12.disabled = true; return true;">
                @csrf
                @if(Auth::check())
                <input type="hidden" name="senderuserid" value="{{ Auth::user()->id }}">
                <input type="hidden" name="uname" value="{{ Auth::user()->username }}">
                @else
                <input type="hidden" name="senderuserid" value="User Not Logged In!!">
                @endif

                <div class="form-group">
                  <label for="balancetransfer">Username</label>
                  <input type="text" name="receiverusername" class="form-control" required>

                </div>
                <div class="form-group">
                    <label for="balancetransfer">Ammount</label>
                    <input type="number" name="ammount" step="0.00001" min="1" max="{{ Auth::user()->wallet }}" class="form-control" required>

                  </div>


                <button type="submit" name="transfermoney12" class="btn btn-primary">Send</button>
              </form>
            </div>



            <div class="balancetransfer-table">
                <table class="table table-responsive-md table-bordered" style="width:80%;">


                    @if(Auth::check())
                    @if (count($balancetransfer))
                    <thead>
                        <tr>
                          <th scope="col">Date</th>

                          <th scope="col">Receiver Username</th>
                          <th scope="col">Ammount</th>
                          <th scope="col">Status</th>

                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($balancetransfer as $balancetransfer)
                            <tr>


                                <td>{{ Str::limit($balancetransfer['created_at'], 10) }}</td>

                                <td>{{$balancetransfer['receiverusername']}}</td>
                                <td>{{$balancetransfer['ammount']}}</td>
                                <td>{{$balancetransfer['status']}}</td>

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
</section>


@endsection
