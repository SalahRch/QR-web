@extends('layouts.app')

@section('content')
    <div class="parallax">
        <div class="bg__first templatemo-position-relative" >
            <div class="container">
                <div class="templatemo-flexbox">

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="left-image wow animated fadeInLeft">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="arrow text-center">
                <a href="#" class="scroll-link btn btn-dark" data-id="second-section"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>

        <div class="bg__third">
            <div id="third-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-10 wow animated fadeInLeft">
                            <div class="left-text">
                                <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">About</h2>
                                <div class="line"></div>
                                <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">random text here about all entr and world blablabla.</p>
                                <div class="button">
                                    <a href="" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-pull-2">
                            <canvas id="earth"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 templatemo-position-relative">
                            <div class="fourth-arrow">
                                <a href="#" class="scroll-link btn btn-dark" data-id="fourth-section"><i class="fa fa-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-md-12 fadeInUp">
                    <div class="sevice-items">
                        <div class="col-md-3 col-sm-6 wow bounceInUp">
                            <div class="single-item">
                                <i class="fa fa-camera"></i>
                                <h2>Scan QR</h2>
                                <p>Scan QR code to access PID</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow bounceInUp">
                            <div class="single-item">
                                <a href="{{route('zones.display')}}">
                                    <i class="fa fa-qrcode" ></i>
                                </a>
                                <h2>EXPLORE QRS</h2>
                                <p>Explore all the QRS available</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow bounceInUp">
                            <div class="single-item">
                                <a href="{{route('zones.displaypdf')}}">
                                <i class="fa fa-file-pdf-o"></i>
                                </a>
                                <h2>Explore P&ID</h2>
                                <p>Explore all the PDF data available</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow bounceInUp">
                            <div class="single-item">
                                <i class="fa fa-download"></i>
                                <h2>Download</h2>
                                <p>Download it ALL!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="service-arrow">
                        <a href="#" class="scroll-link btn btn-dark" data-id="third-section"><i class="fa fa-angle-down"></i></a>
                    </div>
                </div>
            </div>
        </div>




        <div class="bg__fourth">
            <div id="fourth-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-8 col-sm-6 col-xs-10 col-xs-offset-1 wow animated fadeInLeft">
                            <div class="left-text">
                                <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">More ...</h2>
                                <div class="line"></div>
                                <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">bzjdkaedkznfjk ezfbjhzrbfjz zbfrjarfk ejzfbkzfkjz efbzjbfbzbefzk</p>
                                <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">- efueuf jnfejvk</p>
                                <div class="button">
                                    <a href="#" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="fourth-arrow">

                            <a href="#" class="scroll-link btn btn-dark" data-id="fifth-section"><i class="fa fa-angle-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="fifth-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-12 wow animated fadeInDown">
                        <h1>Fill This Application Now!</h1>
                        <div class="col-md-12">
                            <p>Nulla aliquam felis mi, volutpat convallis lorem eleifend id. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div>
                    </div>
                </div>
                <form action="#" method="get">
                    <div class="row">

                        <div class="col-md-8 col-md-offset-2 wow animated fadeInUp">

                            <div class="submit-form">

                                <div class="col-md-3">
                                    <input name="name" type="text" id="name" placeholder="Your name..." />
                                </div>

                                <div class="col-md-3">
                                    <input name="email" type="text" id="email" placeholder="Your email..." />
                                </div>

                                <div class="col-md-3">
                                    <select name="gender" id="gender">
                                        <option value="null">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select name="age" id="age">
                                        <option value="null">Age</option>
                                        <option value="18-24">18 - 24</option>
                                        <option value="25-30">25 - 30</option>
                                        <option value="31-40">31 - 40</option>
                                        <option value="41-60">41 - 60</option>
                                    </select>
                                </div>

                            </div><!-- submit form -->

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4 col-md-offset-5 wow animated fadeInUp">
                            <input type="submit" value="Submit" class="templatemo-submit" />
                        </div>

                    </div>

                </form>
            </div>
        </div>


        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <!--<li><a href="#"><i class="fa fa-google"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="copyright-text">
                        <p>Dessalement de l'eau <span style="font-weight:bold">OCP Group</span></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="third-arrow">
                        <a href="#" class="scroll-link btn btn-dark" data-id="top"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <script>
        // wow
        new WOW({
            animateClass: 'animated',
            offset: 100
        }).init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/108/three.min.js"></script>
    <script src="{{ asset('js/glob.js') }}"></script>


@endsection
