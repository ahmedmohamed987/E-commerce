<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Customers</title>
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/customers.css')}}">
    <link rel="stylesheet" href="{{url('css/all.min.css')}}">
    {{-- <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}"> --}}
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
                <li><a href="{{route('all.customers')}}"class="active"><span class="las la-users"></span><span>Customers</span></a></li>
                <li><a href="{{route('all.products')}}"><span class="las la-box-open"></span><span>Products</span></a></li>
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
                    <div class="customers">
                        <div class="cardd">
                            <div class="cardd-header">
                                <h3>All Customers</h3>
                            </div>
                            <div class="cardd-body">
                                @foreach ($customers as $item )
                                @foreach ($emails as $items )
                                @if ($item['user_id'] == $items['id'])
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{url('images/2.jpg')}}" width="60px" height="60px" alt=""/>
                                        <div>
                                            <h4>{{$item->first_name}}</h4>
                                            <small>{{$item->phone_number}}</small><br>
                                            <small>{{$items->email}}</small><br>
                                            <small>{{$item->location}}</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <a class="las la-trash" href="{{route('del.customer', $item->id)}}"></a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @endforeach
                            </div>
                    </div>
                    <div class="m-4 pag">
                {{$customers->links()}}
            </div>
                </div>
            </main>
        </div>
        <script src="{{url('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
