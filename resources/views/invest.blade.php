@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/invest.css">

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

                <div class="sidebar-items" id="u1">
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

    <div class="user-info" >
        <div class="user-inner"  id="scrollbar">
            <div class="invest" style="text-align: center;" >
                <h4>Your Total Invested Ammount: <span>{{{ isset(Auth::user()->name) ? Auth::user()->invest : Auth::user()->email }}}$</span></span></h4>
            </div>
            <div class="invest-form">
                <form method="POST" class="invest-form-inner" name="invest-form" action="invest" onsubmit="investmoney.disabled = true; return true;">
                    @csrf

                    <h5>Want to Invest again?</h5>
                    @if(Auth::check())
                        <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                    @else
                    <input type="hidden" name="userid" value="User Not Logged In!!">
                    @endif

                    <div class="form-group">
                      <label for="exampleInputEmail1">Ammount</label>
                      <input type="number" class="form-control" name="ammount" min="1" max="{{ Auth::user()->wallet }}" required>
                    </div>


                    <button type="submit" name="investmoney" class="btn btn-primary">INVEST NOW</button>
                  </form>
            </div>

            <div class="invest-tbl">
            <table class="table table-responsive-md table-bordered">
                <thead>
                  <tr>
                    <th scope="col">AMOUNT</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">DATE</th>
                  </tr>
                </thead>
                <tbody>


            @if(Auth::check())
                @if (count($invest))

                    @foreach ($invest as $invest)
                        <tr>
                            <td>{{$invest['ammount']}}</td>
                            <td>{{$invest['status']}}</td>
                            <td>{{ Str::limit($invest['created_at'], 10) }}</td>
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
