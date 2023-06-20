<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <link rel="stylesheet" href="{{url('css/receipt.css')}}">
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
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
                <div class="cards" >
                    <div class="card-single">
                        <div>
                            <h1>Order Receipt</h1><br>
                            <span>{{$cust[0]->first_name}}</span><br>
                            <span>{{$cust[0]->phone_number}}</span><br>
                            <span>{{$cust[0]->location}}</span><br><br>

                            <span ><table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col" ></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td colspan="2">Total</td>
                                    <td>EGP  {{$ord->order_cost}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </span>
                        </div>
                        <div><span class="las la-receipt"></span></div>
                    </div>
                </div>
            </main>
        </div>
</body>
</html>
