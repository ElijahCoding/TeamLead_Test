@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form class="form-group" method="GET" action="{{ route('search') }}">
                        <input class="form-control" value="{{ $query ? $query : '' }}" type="text" name="search" placeholder="Search Product">
                    </form>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($products as $product)
                            <li class="list-group-item">
                                {{ $product->title }}
                                <span class="float-right">{{ $product->sales }} {{ str_plural('sale', $product->sales) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Categories
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item">
                                <a href="{{ route("categories.show", $category->alias) }}">
                                    {{ $category->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
