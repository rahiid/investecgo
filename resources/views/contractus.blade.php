@extends('layouts.app')


@section('assets')
    <link rel="stylesheet" href="css/footer.css">
@endsection


@section('content')

<section class="contractus">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>

            <div class="col-md-8">
                <div class="contractus-text">
                    <!--Section heading-->
                    <h2>Contact us</h2>
                    <!--Section description-->
                    <p >Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                        a matter of hours to help you.</p>

                </div>
            </div>

            <div class="col-md-2">

            </div>
        </div>
        <div class="row">

            <div class="contractus-inner d-flex justify-content-center">



                        <!--Grid column-->
                        <div class="col-md-2">

                        </div>

                        <div class="col-md-10">
                            <form method="POST" id="contact-form" name="contact-form" action="contractus">
                                @csrf
                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="name" class="">Your name</label>
                                            <input type="text" id="name" name="name" class="form-control" required>

                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <label for="email" class="">Your email</label>
                                            <input type="text" id="email" name="email" class="form-control" required>

                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                     <div class="col-md-2"></div>
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <label for="subject" class="">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control" required>

                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <label for="message">Your message</label>
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>

                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->


                                <div class="send-btn" style="margin-top: 30px;">
                                  <button type="submit" class="btn btn-primary">
                                    Send
                                  </button>

                              </div>
                            </form>



                        </div>

                        <div class="col-md-2">
                        </div>
                        <!--Grid column-->


            </div>



        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="address" style="width: 100%; text-align:center; margin-top:40px;">
                    <p>Johannesburg <br>
                        100 Grayston Drive, Sandown, Sandton, 2196, South Africa <br>
                        +27 11 286 7000 <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
