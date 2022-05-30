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
          <h4>Add Permission</span></h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{route('admin.permission.save')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
  </div>
</section>
@endsection