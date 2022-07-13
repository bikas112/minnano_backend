@extends('layouts.admin')
@section('content')
    <style>
        .search-custom span a{
            text-align: right;
            font-size: 20px;
            color: #8e8e8e;
        }
    </style>

    <div class="row">
        <div class="col-sm-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href=" {{ route('home') }} ">Home</a></li>
                <li class="breadcrumb-item active " aria-current="page">Product (<a href="{{route('product.create')}}">Add Product</a>)</li>
            </ol>
        </nav>
        </div>
        
        <div class="col-sm-12 col-lg-12 col-xl-12">
            <div class="body-content">
        <div class="table-responsive"> 
            <table class="table table-hover ">
            <thead class="thead-custom">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">offer Amount</th>
                <th scope="col">offter Status</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
            @foreach($productlists as $productlist)
                <tr>
                <th scope="row">{{  $loop->iteration  }}</th>
                <td>{{$productlist->title}}</td>
                <td>{{$productlist->price}}</td>
                <td>{{$productlist->discountAmount}}</td>
                <td>@if($productlist->discountStatus == 1) <span class="text-success">Active</span>  @else <span class="text-danger">In Active</span> @endif</td>
                    <td>{{ Str::limit($productlist->description, 50)}}</td>
                    <td>
                        <a href="{{route('product.show', $productlist)}}" class="text-success"> <i class="fas fa-eye"></i></a>
                        <a href="{{route('product.edit', $productlist)}}" class="text-info"> <i class="fas fa-pencil-alt"></i></a>
                    </td><td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\ProductController@destroy', $productlist]]) !!}
                        @csrf
                        <button CLASS="btn btn-danger"><i class="fas fa-trash"></i></button>
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            </div>
        <div class="pagination-custom">
            {{ $productlists->links() }}
            </div>
        </div>
    </div>
@endsection
