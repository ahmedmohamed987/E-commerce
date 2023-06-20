<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Admin</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="{{route('dashboard')}}" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a></li>
                <li><a href="{{route('all.customers')}}"><span class="las la-users"></span><span>Customers</span></a></li>
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
                <div class="cards" >
                    <div class="card-single">
                        <div>
                            <h1>{{$number_of_customers}}</h1>
                            <span>Customers</span>
                        </div>
                        <div><span class="las la-users"></span></div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>{{$number_of_products}}</h1>
                            <span>Products</span>
                        </div>
                        <div><span class="las la-box-open"></span></div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>{{$number_of_orders}}</h1>
                            <span>Orders</span>
                        </div>
                        <div><span class="las la-shopping-bag"></span></div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>{{$number_of_orders}}</h1>
                            <span>Receipts</span>
                        </div>
                        <div><span class="las la-receipt"></span></div>
                    </div>
                </div>
                <div class="recent-grid">
                    <div class="products">
                        <div class="card">
                            <div class="card-header">
                                <h3>Recent Products</h3>
                                <button><a href="{{route('all.products')}}">Show all</a><span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Name</td>
                                                <td>Price</td>
                                                <td>Quantity</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $products as $item )
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->quantity}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h3>New Customers</h3>
                                <button><a href="{{route('all.customers')}}">Show all</a><span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                @foreach ($customer as $item )
                                @foreach ($emails as $items )
                                @if ($item['user_id'] == $items['id'])
                                <div class="customer">
                                    <div class="info">
                                        <img src="{{url('images/2.jpg')}}" width="40px" height="40px" alt=""/>
                                        <div>
                                            <h4>{{$item->first_name}}</h4>
                                            <small>{{$items->email}}</small>
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
                </div>
            </main>
        </div>
</body>
</html>
