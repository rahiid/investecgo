@extends('layouts.app')


@section('assets')
    <style>
        .blog-section{
            width: 100%;
            min-height:100vh;
            padding-top: 40px;
            padding-left: 5px;
            padding-right: 5px;
        }
        .blog-section .blog-inner{
            text-align: justify;
           
        }
        .blog-section .blog-inner p{
            font-size: clamp(1rem, 1.3vw, 2rem);
            line-height: clamp(1.5rem, 2.2vw, 4rem);
        }

    </style>

@endsection


@section('content')

    <section class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-inner">
                        <p>
                            A blog (a shortened version of “weblog”) is an online journal or informational website displaying information in reverse chronological order, with the latest posts appearing first, at the top. It is a platform where a writer or a group of writers share their views on an individual subject.
                        </p>
                        <p>
                            There are many reasons to start a blog for personal use and only a handful of strong ones for business blogging. Blogging for business, projects, or anything else that might bring you money has a very straightforward purpose – to rank your website higher in Google SERPs, a.k.a. increase your visibility.
                        </p>
                        <p>
                            As a business, you rely on consumers to keep buying your products and services. As a new business, you rely on blogging to help you get to potential consumers and grab their attention. Without blogging, your website would remain invisible, whereas running a blog makes you searchable and competitive.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
