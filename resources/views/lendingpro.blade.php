@extends('layouts.app')


@section('assets')
<link rel="stylesheet" href="css/lendingpro.css">

@endsection


@section('content')

<section class="lendingpro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ourplans">
                    <h1>Our loans</h1>
                </div>

            </div>
        </div>
        <div class="row">




        </div>

    </div>

</section>
<div class="getloan">
    <h2>Get your loan today</h2>
</div>

<div class="lendingpro-inner">

    <div class="card" style="width: 18rem; border:none; background-color: transparent;">
        <img class="card-img-top" src="/image/instant-approval.svg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Same-day <br> approval</h4>
        </div>
    </div>
    <div class="card" style="width: 18rem; border:none; background-color: transparent;">
        <img class="card-img-top" src="/image/apply-online.svg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Apply online, <br> anytime</h4>
        </div>
    </div>
    <div class="card" style="width: 18rem; border:none; background-color: transparent;">
        <img class="card-img-top" src="/image/same-day-loans.svg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Get a R1000–R8000<br> loan on the same day </h4>
        </div>
    </div>


</div>

<div class="lendingpro-inner">

    <div class="card" style="width: 18rem; border:none; background-color: transparent;">
        <img class="card-img-top" src="/image/cash-to-account.svg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Cash sent straight to <br> your account</h4>
        </div>
    </div>
    <div class="card" style="width: 18rem; border:none; background-color: transparent;">
        <img class="card-img-top" src="/image/no-meetings.svg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">No meetings, no <br> papers, no queues</h4>
        </div>
    </div>
    <div class="card" style="width: 18rem; border:none; background-color: transparent;">
        <img class="card-img-top" src="/image/six-months-to-pay.svg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">6 months to pay</h4>
        </div>
    </div>

</div>

<div class="leding-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="leding-text-inner">
                    <h2>  Complete our quick online application</h2>
                    <p>

With Unifi, everything happens online: Simply sign up and complete our quick, 5-minute online application. <br> We’ll give you an answer immediately and if you qualify, we’ll send cash straight to your bank account on the same day.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="leding-text-inner-right">
                    <h2>Show us proof of income</h2>
                    <p>After filling in your application you can either upload your proof of income directly, <br> or through TruID – a trusted, secure platform that safely sends us your proof of income on your behalf.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
