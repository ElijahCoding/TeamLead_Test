@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $category->title }}
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($category->products()->get() as $product)
                            <li class="list-group-item">
                                {{ $product->title }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
