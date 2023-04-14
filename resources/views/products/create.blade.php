@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Add Product</div>
    <div class="card-body">
        <form method="post" action="/products" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" />
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
                    <input type="text" name="price" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="image" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Date</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>


@endsection