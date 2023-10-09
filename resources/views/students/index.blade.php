@extends('layouts.checklab')
@section('content')
<div class="container-fluid ">
    <h1>รายชื่อ</h1>
    <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
            @foreach($students as $std)
          <tr>
            <th>{{ $std->name }}</th>
            <td>{{ $std->email }}</td>
            <td><button type="button" class="btn btn-danger">Del</button></td>
          </tr>
          @endforeach
        </tbody>
      </table>


</div>
@endsection
