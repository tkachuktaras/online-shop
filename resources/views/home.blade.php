@extends('layouts.app')

@section('head')
    <link href="{{ asset('/css/products.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset("/storage/images/1.jpg") }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset("/storage/images/2.jpg") }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset("/storage/images/3.jpg") }}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container mt-3">
        <h2>The most popular products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-content product-box height">
                            <div class="product-imitation">
                                <img style="width: 100%" src="{{ asset('/storage/images/') }}/{{ $product->img }}">
                            </div>
                            <div class="product-desc">
                    <span class="product-price">
                        {{ $product->price }} UAH
                    </span>
                                <small class="text-muted">Category</small>
                                <a style="cursor: pointer" onclick="addToBasket(this)" class="product-name" data-id={{$product->id}}>Add {{ $product->title }} to basket</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function addToBasket(item){
            $id = $(item).data('id')

            let total_qty = parseInt($('.basket_qty').text())
            total_qty++
            $('.basket_qty').text(total_qty)
            $.ajax({
                url:"{{ route('add-to-basket') }}",
                type: "POST",
                data: {
                    id: $id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
        }
    </script>
@endsection
