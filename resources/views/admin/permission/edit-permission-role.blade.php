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
        <h4>Edit Permission Role {{$user->name}}</span></h4>
    </div>
    <div class="card-body">
        <form method="post" action="/admin/permission/{{$user->id}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <select id="inputState" class="form-control" name="name">
                @foreach($permissions as $index => $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($my_permission as $index => $value)
                <tr>
                <th scope="row">{{$index + 1 }}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</section>
@endsection