<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/products.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Admin</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{route('dashboard')}}" ><span class="las la-igloo"></span><span>Dashboard</span></a></li>
                <li><a href="{{route('all.customers')}}"><span class="las la-users"></span><span>Customers</span></a></li>
                <li><a href="{{route('all.products')}}" class="active"><span class="las la-box-open"></span><span>Products</span></a></li>
                <li><a href="{{route('all.orders')}}"><span class="las la-shopping-bag"></span><span>Orders</span></a></li>
                <li><a href="{{route('home')}}"><span class="las la-home"></span><span>Home</span></a></li>
            </ul>
        </div>
    </div>
        <div class="main-content">
            <header>
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    Dashboard
                </h2>
                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search Here..." />
                </div>
                <div class="user-warpper">
                    <img src="{{url('images/2.jpg')}}" width="40px" height="40px" alt="">
                    <div>
                        <h4>Ahmed Mohamed</h4>
                        <a href="{{route('logout')}}"><small>Logout</small></a>
                    </div>
                </div>
            </header>
            <main>
                <div class="recent-grid">
                    <div class="products">
                        <div class="card">
                            <div class="card-header">
                                <h3>All Products</h3>
                                <button><a href="{{route('add.product')}}">Add New Product</a><span class="las la-box"></span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Image</td>
                                                <td>Name</td>
                                                <td>Category</td>
                                                <td>Price</td>
                                                <td>Quantity</td>
                                                <td class="des">Description</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product )


                                            <tr>
                                                <td><img src="{{$product->image}}" width="70px" height="70px"></td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->categore}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td class="des">{{$product->description}}</td>
                                                <td>
                                                    <div class="contact">
                                                        {{-- <span class="las la-trash"> --}}
                                                            <a class="las la-trash" href="{{route('del.product', $product->id)}}"></a>
                                                        {{-- </span> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            {{--  --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <div>
                {{$products->links()}}
            </div>
        </div>

        <script src="{{url('js/bootstrap.bundle.js')}}"></script>
</body>
</html>
