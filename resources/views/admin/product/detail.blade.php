@extends('layouts.admin-master')

@section('title')
Manage Users
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Users</h1>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
          <h4>Add Product</span></h4>
      </div>
      <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Weight</label>
                <input type="text" class="form-control" name="weight" value="{{$product->weight}}">
            </div>
            <div class="form-group">
                <label for="inputState">Type</label>
                <input type="text" class="form-control" name="type_id" value="{{$product->type_id}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" name="weight" value="{{$product->description}}">
            </div>
        <form method="post" action="{{route('admin.product.save.photo')}}" enctype="multipart/form-data">
            <h5>Add Photo</h5>
            @csrf
            <div class="form-group">
                <label for="inputState">Photo</label>
                <input type="file" class="form-control" name="img">
            </div>
            <input type="text" class="form-control" name="product_id" value="{{$product->id}}" hidden>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-2">
                </div>
                <div class="col-md-auto">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($product->photo as $index => $value)
                            <div class="carousel-item {{ $index == 0 ? 'active' : ''}}">
                                <img width="500" height="300" src="/{{$value->img_url}}" class="d-block w-10" alt="...">
                            </div>
                            @endforeach
                    
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-2">
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection