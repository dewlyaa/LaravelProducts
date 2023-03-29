

@include('partials.header')

@if (Session::has('success'))
{{Session::get('success')}}
@endif

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Address</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  @foreach ($customers as $customer)
  <tbody>
    <tr>
    <th scope="row">{{$customer->id}}</th>
        <td>{{$customer->lastName}}</td>
        <td>{{$customer->firstName}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->address}}</td>
        <td><a class="btn btn-light" href="edit/{{$customer->id}}">Edit</a></td>
        <td><a class="btn btn-dark" href="delete/{{$customer->id}}">Delete</a></td>
    </tr>
  </tbody>
  @endforeach
</table>

@include('partials.footer')