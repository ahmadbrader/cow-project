@extends('layouts.admin-master')

@section('title')
Manage Users
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Product</h1>
  </div>
  <div class="section-body">
    <div class="card">
      <div class="card-header">
          <h4>Product <span>({{ count($products) }})</span></h4>
          @if(Auth::user()->can('product-add'))
          <div class="card-header-action">
              <a href="{{route('admin.product.add')}}" class="btn btn-primary">Add <i class="fas fa-plus"></i></a>
          </div>
          @endif
      </div>
      <div class="card-body">
        <div class="card-title">
          <h6 >Filter</h6>
          <form method="post">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">Type</label>
                <select id="inputState" class="form-control" name="type">
                  <option value="all">All</option>
                  @foreach($types as $index => $value)
                  <option value="{{$value->id}}" {{ $request ?( $request->type == $value->id ? 'selected' : '') : ''}}>{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Type</label>
                <select id="inputState" class="form-control" name="weight">
                  <option value="all">All</option>
                  <option value="200-250" {{ $request ?( $request->weight == '200-250' ? 'selected' : '') : ''}}>200-250</option>
                  <option value="250-300" {{ $request ?( $request->weight == '250-300' ? 'selected' : '') : ''}}>250-300</option>
                  <option value="300-350" {{ $request ?( $request->weight == '300-350' ? 'selected' : '') : ''}}>300-350</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Status</label>
                <select id="inputState" class="form-control" name="status">
                  <option value="all">All</option>
                  <option value="0" {{ $request ?( $request->status == '0' ? 'selected' : '') : ''}}>Ready</option>
                  <option value="1" {{ $request ?( $request->status == '1' ? 'selected' : '') : ''}}>Sold</option>
                </select>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href=""><button type="button" class="btn btn-danger">Reset</button></a>
            
          </form>
        </div>
        <table class="table table-striped">
          <thead>
              <tr>
              <th>#</th>
              <th scope="col">Name</th>
              <th scope="col">Type</th>
              <th scope="col">Weight</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($products as $index => $value)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->typeCow->name}}</td>
              <td>{{$value->weight}}</td>
              <td>{{$value->status == 1 ? 'Sold' : 'Ready'}}</td>
              <td>
                <a href="/admin/product/detail/{{$value->id}}" class="btn btn-primary">
                    <i class="fa fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection