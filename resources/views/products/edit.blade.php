@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Edit</div>
    <div class="card-body">
        <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" value="{{ $product->email }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" value="{{ $product->price }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" />
                    <br />
                    <img src="{{ asset('images/' . $product->image) }}" width="100" class="img-thumbnail" />
                    <input type="hidden" name="hidden_student_image" value="{{ $product->image }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Date</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" value="{{ $product->date }}" />    
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $product->id }}" />
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
    </div>
</div>
@endsection
