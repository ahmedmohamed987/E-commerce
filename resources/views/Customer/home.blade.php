<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/framework.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/master.css')}}">
	<link href="{{url('css/fontawesome-free-6.1.2-web/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body>
	<!-- 0 header -->
	<div class="head">
		<div class="container">
			<h1 style="margin:0px;">Smart Store</h1>
		</div>
	</div>
	<header>
		<div class="container">
			<div class="head-left">
				<img src="{{url('images/Land.png')}}">
				<form action="{{route('search.results')}}" method="POST">
                    @csrf
                    <input class="searchh" type="search" name="product_name" placeholder="what are u looking for ?">
                    <button  style="color:white; background-color:black;" class="search-bt ">Search</button>
                </form>
			</div>

            @if (!Session::has('logged_in_customer') && !Session::has('logged_in_admin'))
                <div class="head-Right">
                    <button style="color:white; background-color:black;" class="search-bt"><a href="{{route('login')}}">Login</a></button>
                </div>
            @elseif (Session::has('logged_in_customer'))
                <div class="head-Right">
                    <a href="{{route('shoppingcart')}}" class="carddd"><img src="{{url('images/shopping-card.png')}}"></a>
                    <button style="color:white; background-color:black;" class="search-bt"><a href="{{route('logout')}}">Logout</a></button>
                </div>
            @endif

		</div>
	</header>
	<!-- 1 header -->
	<!-- 0 content -->
	<section class="content">
        @if(Session()->has('submit_order'))
        <div class="alert alert-success alert w-50" role="alert">
                        Your order has been submitted successfully..
        </div>
        @endif
		<div class="container">

			<div class="sidebar bg-white p-20 p-relative">

	       @if(Session::has('logged_in_admin'))
			<h3 class="p-relative txt-c mt-0"> <i class="fa-solid fa-bars"></i><a href="{{route('dashboard')}}"class="dashh" >  Dashboard</a></h3>
            @endif
			<h3 class="p-relative txt-c mt-0">Categories</h3>
	        <ul>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10 link" href="#skincare">
                    <span>Skin Care</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10 link" href="#makeup">
                    <span>Make up</span>
                    </a>
                </li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10 link" href="#watches">
                    <span>Watches</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10 link" href="#TV">
                    <span>TV</span>
                    </a>
                </li>
	        </ul>
	    </div>

			<div id="carouselExampleFade" class="carousel slide carousel-fade img" data-bs-ride="carousel">
				<div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{url('images/m.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{url('images/FhQ9y-8aEAAZAFV.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{url('images/LX5ipuxb4vckRpKt7o5oLC.jpg')}}" class="d-block w-100" alt="...">
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
        </div>
	</section>
<br>
<br>
		<div class="container">
				<div class="line"id="skincare">
				    <h2>Skin Care</h2>
				</div>
				<div class="row" >
                    @foreach ($skincareproducts as $item )
					<div class="card m-3 border-0" style="width: 17rem;">
                            <h3>{{$item->name}} </h3>
                            <div class="im"><a href="{{route('product.details', $item->id)}}"><img src="{{$item->image}}"></a></div>
                            <h4 class="pri">EGP {{$item->price}}</h4>
                            @if($item->quantity == 0 )
                            <a href="#"class="cardd-bt">Sold out</a>
                            @else
                            <a href="{{route('cart', $item->id)}}"class="cardd-bt">Add to cart</a>
                            @endif
                        </div>
                    @endforeach
				</div>
                <br>
				<div class="line" id="makeup">
				    <h2>Makeup</h2>
				</div>
				<div class="row">
                    @foreach ($makeup as $item )
					<div class="card m-3 border-0" style="width: 14rem;">
						<h3>{{$item->name}}</h3>
						<div class="im"><a href="{{route('product.details', $item->id)}}"><img src="{{$item->image}}"></a></div>
					    <h4 class="pri">EGP {{$item->price}}</h4>
					    @if($item->quantity == 0 )
                            <a href="#"class="cardd-bt">Sold out</a>
                        @else
                            <a href="{{route('cart', $item->id)}}"class="cardd-bt">Add to cart</a>
                        @endif
					</div>
                    @endforeach
				</div>
                <br>
				<div class="line" id="watches">
				    <h2>watches</h2>
				</div>
				<div class="row">
                    @foreach($watches as $watch)
					<div class="card m-3 border-0" style="width: 17rem;">
						<h3>{{$watch->name}}</h3>
						<div class="im"><a href="{{route('product.details', $item->id)}}"><img src="{{$watch->image}}"></a></div>
					    <h4 class="pri">EGP {{$watch->price}}</h4>
					    @if($item->quantity == 0 )
                            <a href="#"class="cardd-bt">Sold out</a>
                        @else
                            <a href="{{route('cart', $watch->id)}}"class="cardd-bt">Add to cart</a>
                        @endif
					</div>
                    @endforeach
				</div>
                <br>
				<div class="line" id="TV">
				    <h2>TV</h2>
				</div>
                <div class="row">
                    @foreach ($tvs as $tv )
                        <div class="card m-3 border-0" style="width: 17rem;">
                            <h3>{{$tv->name}}</h3>
                            <div class="im"><a href="{{route('product.details', $item->id)}}"><img src="{{$tv->image}}"></a></div>
                            <h4 class="pri">EGP {{$tv->price}}</h4>
                            @if($item->quantity == 0 )
                            <a href="#"class="cardd-bt">Sold out</a>
                            @else
                            <a href="{{route('cart', $tv->id)}}"class="cardd-bt">Add to cart</a>
                            @endif
				        </div>
                    @endforeach
				</div>
                <br>
			</div>
		</div>
<script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
