<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/orders.css')}}">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Admin</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{route('dashboard')}}"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
                <li><a href="{{route('all.customers')}}"><span class="las la-users"></span><span>Customers</span></a></li>
                <li><a href="{{route('all.products')}}"><span class="las la-box-open"></span><span>Products</span></a></li>
                <li><a href="{{route('all.orders')}}" class="active"><span class="las la-shopping-bag"></span><span>Orders</span></a></li>
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
                            <h3>All Orders</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Username</td>
                                            <td>Phone Number</td>
                                            <td>Order Number</td>
                                            <td>Show Order Receipt</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1
                                        @endphp
                                        @foreach ($orders as $x )
                                        <tr>
                                            <td>{{$x->first_name}}</td>
                                            <td>{{$x->phone_number}}</td>
                                            <td>{{$i}}</td>
                                            <td><a href="{{route('receipt', $x->id)}}"><span class="las la-receipt"></span><span>View order details</span></a></td>
                                            @php
                                                $i++
                                            @endphp
                                        </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </body>
</html>
