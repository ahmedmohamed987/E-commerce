<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
    <link rel="stylesheet"  href="{{url('bootstrap-4.0.0/bootstrap-4.0.0/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/addproduct.css')}}">
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
            <div class="main">
                <form action="{{route('addprod')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input name="category" type="text" class="form-control" id="exampleInputName" placeholder="Enter Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputQuantity">Product Quantity</label>
                        <input name="quantity" type="number" class="form-control" id="exampleInputQuantity" placeholder="Enter Product Quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPrice">Product Price</label>
                        <input name="price" type="number" class="form-control" id="exampleInputPrice" placeholder="Enter Product Price" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlDescription">Product Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlDescription" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile">Product Image</label>
                        <input name="img" type="file" id="formFile" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add New Product</button>
                </form>
            </div>

</body>
</html>
