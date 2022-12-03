@extends('layouts.app')


@section('assets')
    <style>
        .lendingproducts-section{
            width: 100%;
            min-height:100vh;
            padding-top: 40px;
            padding-left: 5px;
            padding-right: 5px;
        }
        .lendingproducts-section .lendingproducts-inner{
            text-align: justify;

        }
        .lendingproducts-section .lendingproducts-inner p{
            font-size: clamp(1rem, 1.3vw, 2rem);
            line-height: clamp(1.5rem, 2.2vw, 4rem);
        }

    </style>

@endsection


@section('content')

    <section class="lendingproducts-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="lendingproducts-inner">
                        <h4 style="margin-bottom: 20px;">
                            Important Notes
                        </h4>
                        <p>
                            The solution identified above is a linked website or service (Third-Party Services). Third-Party Services are not under the control of Bitfinex or its Associates, and Bitfinex and its Associates make no representations about, and accept no liability for, any Third-Party Services. Bitfinex and its Associates are not responsible for the accuracy or reliability of any information, data, opinions, advice, or statements contained in Third-Party Services, the services offered thereby or for their privacy and security policies and procedures.
                        </p>
                        <p>
                            Nothing on this page is financial, legal or other advice. Nothing on this page is an offer to borrow or lend or the solicitation, recommendation or endorsement of any course of borrowing or lending. Any references on this page to returns are only hypothetical and not guaranteed.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
