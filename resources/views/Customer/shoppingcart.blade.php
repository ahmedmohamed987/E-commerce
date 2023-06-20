<!DOCTYPE html>
<html>
<head>
    <title>Shopping cart</title>
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/shoppingcart.css')}}">
</head>
<body class="card-body">
  <div class="nav container" style="justify-content:flex-start;"><h3>Home</h3><h3>/</h3><h3 style="color:red;">Shopping cart</h3></div>
  <div class="container">
    <!-- 0 shop-pro -->
    <div class="shop-pro">
      <!-- 0 small-card -->
      @foreach ($cartproducts as $item )
      <div class="small-card" id='product'>
        <div class="seller">
          <div class="white-box"><img src="{{$item->image}}"></div>
          <p class="discribtion">
          {{-- @php --}}
          {{-- // $arr=explode(' ',trim($item->name)) --}}
          
         
            {{-- // {{$arr[0].' '.$arr[1].' '.$arr[2].'...'}} --}} 
           {{-- @endphp --}}
           {{substr($item->name, 1,15)}}

        </p>
        </div>
        <div class="countity">
          {{-- <button id="but1" class="b1">-</button> --}}
          {{-- <input   class="input" id ="text" type="text" value="{{$item->product_quantity}}"> --}}
          {{-- <button id="but2" class="b2">+</button> --}}
          {{$item->product_quantity}}
        </div>
        <div class="cost">{{$item->price}}</div>
        <a class="las la-trash" href="{{route('remove.item', $item->id)}}" style="color: red"></a>
        {{-- <div class="x-icone"><button><img style="width:32px;" src="{{url('images/cancel_circle.png')}}"></button></div> --}}
      </div>
      @endforeach
    </div>
    <!-- 1 shop-pro -->
    <!-- 0 list -->
    <div class="list">
      <h2 class="head-recib">Order summary</h2>
      <hr>
      <!-- 0 head product -->
      <div class="head-product">
        <div class="id">Name</div>
        <div class="countatiy">Quantity</div>
        <div class="costs">Total Item Price</div>
      </div>
      <!-- 1 head product -->
      <!-- 0 head product -->
      @foreach ( $cartproducts as $item )
      <div class="head-product">
        <div class="id">
          {{-- @php
          $arr=explode(' ',trim($item->name))
          @endphp
            {{$arr[0].' '.$arr[1].' '.$arr[2].'...'}} --}}
            {{substr($item->name, 1, 15)}}
        </div>
        <div class="countatiy">{{$item->product_quantity}}</div>
        <div class="costs">{{$item->total_price}}</div>
      </div>
      @endforeach
      <div class="head-product" style="border-bottom:none; margin-bottom:30px;">
        <div  class="id">Shipping</div>
        <div  class="costs">EGP 20</div>
      </div>
      <div class="head-product" style="border-bottom:none; margin-bottom:30px;">
        <div  class="id">Total </div>
        <div  class="costs">EGP {{$totalcost + 20}}</div>
      </div>
      <!-- 1 head product -->
      <a href="{{route('creditcard')}}" class="pay">Pay</a>
    </div>
    <!-- 1 list -->
  </div>
  <div class="container">
    <div class="back"><img src="{{url('images/arrow_right_alt.png')}}"><a href="{{route('home')}}" style="color:red;">Continue shopping</a></div>
  </div>


  <script src="{{url('jquery-3.6.0.min.js')}}"></script>
  <script>



     $('.b2').click(function(){

          let x = $('.input').val()
          x++

          if(x<=1)
          {
              x=1
          }
          $('.input').val(x)
        })
        $('.b1').click(function(){
          let x = $('.input').val()
          if(x >1){
           x--
          }
          if(x<=1)
          {
              x=1
          }
          $('.input').val(x)
        })
  </script>
</body>
</html>
