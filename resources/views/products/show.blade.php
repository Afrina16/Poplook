@extends('layouts.app')

{{-- display title according to the product name  --}}
@section('title', $product->name)

@section('content')
    
    <div class="row">
        <div class="col-12 mb-5 text-end">
            {{-- breadcrumb --}}
            <a href="{{ route('products.index') }}" class="text-decoration-none ">{{ $product->product_category->name }}</a> \ {{ $product->name }}
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            {{-- array based on image url --}}
                            <img src="{{ $product->image_url[0] }}" alt="" class="img-fluid mb-3">
                        </div>
                        <div class="col-md-8 d-flex flex-column justify-content-between">
                            <div>
                                <div class="mb-3">
                                    <h5 class="fw-bold">Colours</h5>
                                    <div>
                                        @foreach ($product->color_related as $color)
                                            <img src="{{ $color->image_color_url }}" alt="" data-bs-toggle="tooltip" data-bs-title="{{ $color->color_title }}" data-bs-placement="bottom">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="fw-bold">Sizes</h5>
                                    <div>
                                        @foreach ($product->attribute_list as $size)
                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="tooltip" data-bs-title="{{ $size->quantity }} pcs left" data-bs-placement="bottom">{{ $size->attribute_name }}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h3 class="fw-bold">{{ $product->name }}</h3>
                                <h1 class="fw-bold">{{ $product->currency_sign }} {{ $product->price_tax_inc }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection