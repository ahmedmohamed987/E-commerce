<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('css/index.css')}}">
</head>
<body>
    <div class="grid text-center ">
        <div class="row ">
        <div class="col-lg-6 "><img src="{{$product_details->image}}" class="w-100" alt=""></div>
        <div class="col-lg-6 paragraph "> {{$product_details->description}}
            <span>Price: EGP  {{$product_details->price}}</span>


          <button class="cart"> <a href="{{route('cart', $product_details->id)}}"> <i class="fa-solid fa-cart-shopping fa-xl cart" style="color: black;"></i>AddToCart</a>
          </button>
        </div>
      </div>


    </div>





    <script src="{{url('js/bootstrap.bundle.min.js')}}" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
