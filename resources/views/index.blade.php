@extends('layouts.app')

@section('content')


<section class="ticker">

                    <div class="d-flex justify-content-between align-items-center breaking-news">
                        <div class="head d-flex flex-row flex-grow-1 flex-fill justify-content-center  py-2  px-1 news"><span class="d-flex align-items-center">&nbsp;INVESTMANIA&nbsp;Pulse&nbsp;</span></div>

                        <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        @php( $ticker = \App\Ticker::all() )

                        @if (count($ticker))
                        @foreach ($ticker as $ticker)
                        <a href="{{$ticker['url']}}">{{$ticker['text']}}</a>
                        <span class="dot">&nbsp;|&nbsp;</span>

                        @endforeach

                        @else
                        <a href="#">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </a>
                        <span class="dot">&nbsp;|&nbsp;</span>
                        <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </a>
                        <span class="dot"></span>
                        <a href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse </a>

                        @endif

                    </marquee>

                    </div>

</section>


<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-inner">
                    <h1>World Class Investment Platform.</h1>
                    <h4>Join INVESTMANIA and start invest today.</h4>


                    @if(Auth::check())
                    <a href="/user" class="btn   btn-one">GO TO DASHBOARD</a>
                    @else
                    <a href="/register" class="btn   btn-one">JOIN NOW</a>
                    @endif



                </div>
            </div>
        </div>
     </div>
</section>


<section class="currency-table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="currency-table-inner">
                    <iframe src="https://www.widgets.investing.com/top-cryptocurrencies?theme=lightTheme&hideTitle=true" width="100%" height="100%" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0"></iframe>	</div>
                </div>
            </div>
        </div>

</section>

<section class="volume">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="volume-wrapper">
                    <div class="volume-inner">
                        <h2>$1,686,671,297</h2>
                        <p>24 Hour Volume</p>
                    </div>
                    <div class="volume-inner">
                        <h2>$22,211,943,117</h2>
                        <p>7 Day Volume</p>
                    </div>
                    <div class="volume-inner">
                        <h2>$173,935,803,504</h2>
                        <p>30 Day Volume</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="feature-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature-section-heading">
                    <p>FEATURES</p>
                    <h1>World Class Trading Platform</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="feature-section-inner">

                    <div class="card">
                        <img class="card-img-top" src="/image/f1.svg" alt="Card-image">
                        <div class="card-body pull-right">
                          <h5 class="card-title">Exchange</h5>
                          <p class="card-text">INVESTMANIA offers order books with top tier liquidity, allowing users to easily exchange Bitcoin, Ethereum, EOS, Litecoin, Ripple, NEO and many other digital assets with minimal slippage.</p>

                        </div>
                    </div>

                    <div class="card">
                        <img class="card-img-top" src="/image/f2.svg" alt="Card-image">
                        <div class="card-body">
                          <h5 class="card-title">Margin funding</h5>
                          <p class="card-text">Liquidity providers can generate yield by providing funding to traders wanting to trade with leverage. Funding is traded on an order book at various rates and periods.</p>

                        </div>
                    </div>


                    <div class="card">
                        <img class="card-img-top" src="/image/f3.svg" alt="Card-image">
                        <div class="card-body">
                          <h5 class="card-title">Margin trading</h5>
                          <p class="card-text">INVESTMANIA allows up to 10x leverage trading by providing traders with access to the peer-to-peer funding market.</p>

                        </div>
                    </div>
                    
<!----------------------------------------------------------------------------SEFDS0VSLkVYRQ---------------------------------------------------------------------------->

                    <div class="card">
                        <img class="card-img-top" src="/image/f4.svg" alt="Card-image">
                        <div class="card-body">
                          <h5 class="card-title">Order types</h5>
                          <p class="card-text">INVESTMANIA offers a suite of order types to give traders the tools they need for every scenario. Discover more about our most advanced Algorithmic orders types.</p>

                        </div>
                    </div>


                    <div class="card">
                        <img class="card-img-top" src="/image/f5.svg" alt="Card-image">
                        <div class="card-body">
                          <h5 class="card-title">Customizable interface</h5>
                          <p class="card-text">Organize your workspace according to your needs: compose your layout, choose between themes, and set up notifications.</p>

                        </div>
                    </div>


                    <div class="card">
                        <img class="card-img-top" src="/image/f6.svg" alt="Card-image">
                        <div class="card-body">
                          <h5 class="card-title">Security</h5>
                          <p class="card-text">Security of user information and funds is our first priority. Learn more about our security features and integrations.</p>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="feature-section-btn">

                </div>
            </div>
        </div>
    </div>
</section>



<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter-inner">
                    <h3>Newsletter</h3>
                    <p>Sign up for recieve email updates from <span><a href="/">INVESTMANIA</a></span></p>

                </div>
                <form class="news-mail-wrapper">
                    <div class="form-group news-mail">
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                      <button type="button" class="btn btn-primary btn-sm">Sign Up</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>


@endsection
