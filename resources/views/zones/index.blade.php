<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OCP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/templatemo-style.css')}}">
    <script src="../../../../blog/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style>
        /* * {
box-sizing: border-box;
margin: 0;
padding: 0;
} */
        .boxSlide {

            display: flex;
            justify-content: center;
            align-items: center;
            /* background: rgb(25,12,41); */
        }
        .slider {
            position: relative;
            width: 60%;
            overflow: hidden;
        }
        .images {
            display: flex;
            width: 100%;
        }
        .images img {
            height: 400px;
            width: 100%;
            transition: all 0.15s ease;
        }
        .images input {
            display: none;
        }
        .dots {
            display: flex;
            justify-content: center;
            margin: 5px;
        }
        .dots label {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            border: solid #000 3px;
            cursor: pointer;
            transition: all 0.15s ease;
            margin: 5px;
        }
        .dots label:hover {background: #000;}
        #img1:checked ~ .m1 {
            margin-left: 0;
        }
        #img2:checked ~ .m2 {
            margin-left: -100%;
        }
        #img3:checked ~ .m3 {
            margin-left: -200%;
        }
        #img4:checked ~ .m4 {
            margin-left: -300%;
        }
    </style>
</head>
<body>


<div id="heading-pages">
    <!-- <div>
        <img src="images/ph3.jpg" class="img-responsive" alt="post header">
    </div> -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12">
            <h2>About Kiley </h2>
            <p>KM Health & Fitness</p>
        </div>
    </div>
</div>

<div class="elements">

    <div class="container">
        <div class="row">
            <div class="2-comulns-text">
                <div class="col-md-6">
                    <div class="elements-headings">
                        <h2 style="font-size:16px;">{{$zone->name}}</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6">

                        <p style="text-align:left">
                            Created at: {{ $zone->created_at }}
                        </p>
                        <p style="text-align:left">
                            Last update: {{ $zone->updated_at }}
                        </p>
                        <p style="text-align:left">
                            Description :
                        </p>
                        <p style="text-align:left">
                            {{$zone->description}}
                        </p>
                        <a href="/zones/{{$zone->zone_id}}/edit" class="btn btn-primary">Edit</a>
                        <a href="/zones/{{$zone->zone_id}}/delete" class="btn btn-danger">Delete</a>

                    </div>
                    <div class="col-md-6 boxSlide">
                        <div class="slider">
                            <div class="images">
                                <input type="radio" name="slide" id="img1" checked>
                                <input type="radio" name="slide" id="img2">
                                <input type="radio" name="slide" id="img3">

                                <img src="/qrcodes/{{$zone->name}}.svg" class="m1" alt="QR Code">
                                <img src="/images/ph1.png" class="m2" alt="img2">
                                <img src="/images/ph3.png" class="m3" alt="img3">
                            </div>
                            <div class="dots">
                                <label for="img1"></label>
                                <label for="img2"></label>
                                <label for="img3"></label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>










    <footer>
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="social-icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <!--<li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2084 Company Name</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="third-arrow">
                        <a href="#" class="scroll-link btn btn-dark" data-id="top"><i class="fa fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="../../../../blog/public/js/vendor/jquery-1.11.1.min.js"></script>
<script src="../../../../blog/public/js/vendor/bootstrap.min.js"></script>
<script src="../../../../blog/public/js/main.js"></script>
<!-- templatemo 438 layer -->

</body>
</html>