@extends('layouts.app')

{{-- display title according to the category name --}}
@section('title', $results->category->name)

@section('content')

    <div class="row">
        <div class="col-12 mb-5 text-end">
            {{ $results->category->name }} 
        </div>
        <div class="col-12">
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                @foreach ($results->data as $product)
                    <a href="{{ route('products.show', ['product'=>$product->id_product]) }}" class="text-dark text-decoration-none">
                        <div class="card" style="width: 19rem;">
                            {{-- array based on image url --}}
                            <img src="{{ $product->image_url[0] }}" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <small class="card-text">{{ $product->name }}</small>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <small class="card-text">{{ $results->currency->sign }} {{ $product->price_tax_inc }}</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <small class="card-text text-muted">Available in {{ $product->total_colours }} colors</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @foreach ($product->related_colour_data as $colour)
                                        <img src="{{ $colour->image_color_url }}" alt="" data-bs-toggle="tooltip" data-bs-title="{{ $colour->color_title }}" data-bs-placement="bottom">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection