@extends('layouts.app')

@section('assets')
    <link rel="stylesheet" href="css/referrer.css">
    <script>

        function copyToClipboard(text) {
        var inputc = document.body.appendChild(document.createElement("input"));


        var element = document.getElementById('referrerlink');
        var textNode = element.firstChild;
        var URI = textNode.data;

        inputc.value = URI;
        inputc.focus();
        inputc.select();
        document.execCommand('copy');
        inputc.parentNode.removeChild(inputc);
        alert("Link Copied.");
        }
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
                <div class="sidebar-items">
                    <i class="fas fa-money-check-alt fa-lg"></i>

                    <a href="/withdraw" class="sidebar-links stretched-link"><h5>Withdraw</h5></a>
                </div>
                <div class="sidebar-items" id="u1">
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
        <div class="user-inner reffer" id="scrollbar">
            <div class="reffer-inner" >

                @if(Auth::check())
                    @if (count($userdata))
                        @foreach ($userdata as $userdata)

                                    <p  id="referrerlink">http://INVESTMANIA.org/register?hashd={{$userdata['id']}}&hashl={{$hashll}}</p> <br> <br>
                                    <a class="btn" onclick="copyToClipboard()">Copy Link</a>

                        @endforeach


                    @endif

                  @else

                  <h1 style="color: #3361FF;">No Link Available!!</h1>

                  @endif

            </div>

            <div class="reffer-history">
                <table class="table table-responsive-md table-bordered" style="width:100%; text-align:center;">
                        @if(Auth::check())
                        @if (count($referrers))

                        <thead style="background-color:#3361FF; color: white; letter-spacing: 0.1rem; font-weight: 300;">

                            <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Generation</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($referrers as $referrers)
                                <tr>

                                    <td>{{$referrers['username']}}</td>
                                    <td>{{$referrers['hashl']}}</td>

                                </tr>

                            @endforeach


                        @endif


                        @else

                        <h1 style="color: #7C4DFF;">No Data to Show!!!</h1>

                    </tbody>
                        @endif

                </table>
            </div>

        </div>

    </div>
</section>


@endsection
