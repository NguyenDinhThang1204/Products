@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Products Data</b></div>
            <div class="col col-md-6">
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-end">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Price</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>


                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->email }}</td>
                        <td>{{ $product->gender }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->image }}</td>
                        <td>{{ $product->date }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                            </form>

                        </td>
                        
                    </tr>

                @endforeach
        </table>
    </div>
</div>

@endsection


