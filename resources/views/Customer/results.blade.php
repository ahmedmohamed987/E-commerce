<html>
    <head>
        <meta name="viewport" content="">
        <link rel="stylesheet"  href="{{url('css/fontawesome-free-6.1.2-web/css/all.min.css')}}">
        <link rel="stylesheet"  href="{{url('css/bootstrap.min.css')}}">
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        <link rel="stylesheet"  href="{{url('line-awesome-1.3.0/1.3.0/css/line-awesome.min.css')}}">
        <link rel="stylesheet"  href="{{url('css/search.css')}}">
        <title>Results</title>

    </head>

    <body>

    <div class="container">
        <div class="row">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
            <div class="grid search">
                <div class="grid-body">
                <div class="row">
                        <!-- BEGIN FILTERS -->
                        <div class="col-md-3">
                            <h2 class="grid-title"><i class="fa fa-filter icon"></i> Filters</h2>
                            <hr>
                            <!-- BEGIN FILTER BY CATEGORY -->
                            <h4>By Price:</h4>
                            {{-- <form action="{{route('filter.results')}}" method="POST">
                                @csrf

                            {{-- <button type="submit"> Filter</button> --}}
                            {{-- </form>  --}}
                        </div>
                        <!-- END FILTERS -->


                        <!-- BEGIN RESULT -->
                        <div class="col-md-9">
                            <h2><i class="fa-regular fa-file icon"></i> Result</h2>
                            <hr>

                        <!-- BEGIN SEARCH INPUT -->
                        <form aaction="{{route('search.results')}}" method="POST" >
                        @csrf
                            <div class="input-group">
                            <input type="text" class="form-control " value="{{$product}}"  name="product_name" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-primary iconn " type="button"><i class="fa fa-search icons" style=></i></button>
                            </span>
                            </div>
                            <span class="pp">Showing all matching results</span>
                            <label class="check"><input name="filter_value" value="high" type="radio" class="icheck"> From high to low </label>
                            <label class="check"><input name="filter_value" value="low" type="radio" class="icheck"> From low to high</label>
                        </form>
                        <!-- END SEARCH INPUT -->

                        <div class="row">
                            <!-- BEGIN ORDER RESULT -->
                                <!-- <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Search by
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">price</a></li>
                                    <li><a class="dropdown-item" href="#">Name</a></li>

                                    </ul>
                                </div> -->
                                <!-- END ORDER RESULT -->


                                <!-- BEGIN TABLE RESULT -->
                                <div class="table-responsive ">
                                    <table class="table table-hover">
                                        <tbody>
                                            @php
                                                $count = 1
                                            @endphp
                                            @foreach ( $products as $product )
                                                <tr class="tabble">
                                                    <td class="number text-center">{{$count}}</td>
                                                    <td class="image"><img src="{{$product->image}}" alt=""></td>
                                                    <td class="Product"><strong>{{$product->name}}</strong><br> {{$product->description}}</td>
                                                    <td class="price text-right">{{$product->price}}</td>
                                                    <td><a href="{{route('cart', $product->id)}}"><span class="las la-shopping-bag"></span></a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $count++
                                                @endphp
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END TABLE RESULT -->
                        </div>
                        <!-- END RESULT -->
                    </div>
                    </div>
                </div>
            </div>
            <!-- END SEARCH RESULT -->
        </div>
    </div>
        <!-------------------java script------------------->
        <!--1- fontawesome -->
        <script src="css/fontawesome-free-6.1.2-web/js/all.min.js"></script>
        <!--2- js ---->
        <script src=""></script>
    </body>
</html>
