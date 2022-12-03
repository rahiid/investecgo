@extends('layouts.app')


@section('assets')
    <link rel="stylesheet" href="css/investcal.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function(){


            $("#ammount").on("input", function(){
                // Print entered value in a div box
                var num = $(this).val();
                var result= 0;
                var gen = $('#level').find(":selected").val();
                console.log();

                var percent = (parseInt(gen)/100) * parseInt(num);

                var result = parseInt(num) +  percent;

                if(isNaN(parseInt(num))) {
                var result = 0;
                $("#referrer").text(result);
                }

                else{
                    $("#referrer").text(result);
                }

            });

        });

    </script>
@endsection


@section('content')

    <section class="investcal-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Referrer Percentage Calculator</h2>
                    <div class="investcal-inner">




                        <div class="form-group" style="padding-bottom: 10px">
                            <label for="exampleFormControlSelect1">Select Genaration</label>
                            <select class="form-control" class="level" id="level">
                              <option value="7" selected>Level 1</option>
                              <option value="5">Level 2</option>
                              <option value="3">Level 3</option>
                              <option value="2">Level 4</option>
                              <option value="1">Level 5</option>
                              <option value="1">Level 6</option>
                              <option value="1">Level 7</option>
                            </select>
                          </div>

                        <div class="form-group">
                            <input type="number" id="ammount" name="ammount" class="form-control"  placeholder="Enter Amount">
                            <small id="emailHelp" class="form-text text-muted">Enter the Amoumt which new user has depoisted.</small>
                          </div>

                          <h3 id="referrer" style="color: #3361FF; font-weight: 700; padding-top:20px"></h3>

                          <table class="table table-bordered form-group" style="width: 50%; margin-top:40px; padding-bottom: 50px;">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Genaration</th>
                                <th scope="col">Percentage</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1st</th>
                                <td>7%</td>
                              </tr>
                              <tr>
                                <th scope="row">2nd</th>
                                <td>5%</td>
                              </tr>
                              <tr>
                                <th scope="row">3rd</th>
                                <td>3%</td>
                              </tr>
                              <tr>
                                <th scope="row">4th</th>
                                <td>2%</td>
                              </tr>
                              <tr>
                                <th scope="row">5th</th>
                                <td>1%</td>
                              </tr>
                              <tr>
                                <th scope="row">6th</th>
                                <td>1%</td>
                              </tr>
                              <tr>
                                <th scope="row">7th</th>
                                <td>1%</td>
                              </tr>

                            </tbody>
                          </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
