@extends('layouts.admin-master')

@section('title')
Manage Users
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Manage Role Permission</h1>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
          <h4>Permission</span></h4>
          <div class="card-header-action">
              <a href="{{ route('admin.permission.add') }}" class="btn btn-primary">Add <i class="fas fa-plus"></i></a>
          </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">Role</h5>
        <table class="table table-striped">
          <thead>
              <tr>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach($roles as $index => $value)
            <tr>
              <td>{{$value->name}}</td>
              <td>
                <a href="/admin/permission/{{$value->id}}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
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