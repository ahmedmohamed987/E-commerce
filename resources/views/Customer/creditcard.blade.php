<html>
    <head>
        <meta name="viewport" content="">
        <link rel="stylesheet"  href="{{url('css/normalize.css')}}">
        <link rel="stylesheet"  href="{{url('css/fontawesome-free-6.1.2-web/css/all.min.css')}}">
        <link rel="stylesheet"  href="{{url('css/bootstrap.min.css')}}">
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <link rel="stylesheet"  href="{{url('css/creditcard.css')}}">
        <title>Credit Card</title>

    </head>

    <body>
      <div class="card mt-50 mb-50 ">
        <div class="card-title mx-auto textt">
          Credit card
        </div>
        {{-- <div class="nav">
            <ul class="mx-auto ">
                <li><a href="#">Account</a></li>
                <li class="active "><a class="Pt"  href="#">Payment</a></li>
            </ul>
        </div> --}}
        <form  action="{{route('checkout')}}" method="POST">
            @csrf
            {{-- <span id="card-header">Saved cards:</span>
            <div class="row row-1">
                <div class="col-2"><img class="img-fluid" src="{{url('images/mastercard-logo.png')}}"/></div>
                <div class="col-7">
                    <input type="text" placeholder="**** **** **** 3193">
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <a href="#">Remove card</a>
                </div>
            </div>
            <div class="row row-1">
                <div class="col-2"><img  class="img-fluid" src="{{url('images/visaaa.png')}}"/></div>
                <div class="col-7">
                    <input type="text" placeholder="**** **** **** 4296">
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <a href="#">Remove card</a>
                </div>
            </div> --}}
            <span id="card-header">Add new card:</span>
            <div class="row-1 ">
                <div class="row row-2 bb">
                    <span id="card-inner">Card holder name</span>
                </div>
                <div class="row row-2 bb">
                    <input name="card_name" type="text" placeholder="Ahmed Nasser">
                </div>
            </div>
            <div class="row three">
                <div class="col-7">
                    <div class="row-1">
                        <div class="row row-2">
                            <span id="card-inner">Card number</span>
                        </div>
                        <div class="row row-2">
                            <input name="card_number" type="number" placeholder="5134-5264-4">
                        </div>
                    </div>
                </div>
                <div class="col-2 box">
                    <input name="expiry_date" type="date" placeholder="Exp. date">
                </div>
                <div class="col-2 box">
                    <input name="cvv" type="number" placeholder="CVV">
                </div>
            </div>
            <button class="btn d-flex mx-auto"><b>Add Card</b></button>
        </form>
    </div>



        <!-------------------java script------------------->


        <!--1- fontawesome -->
        <script src="css/fontawesome-free-6.1.2-web/js/all.min.js"></script>

        <!--2- js ---->
        <script src=""></script>



    </body>
</html>

