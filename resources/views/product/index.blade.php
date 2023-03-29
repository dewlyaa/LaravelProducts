@include('partials.header')

@if (Session::has('success'))
{{Session::get('success')}}
@endif

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  @foreach ($products as $product)
  <tbody>
    <tr>
    <th scope="row">{{$product->id}}</th>
        <td>{{$product->description}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td><a class="btn btn-light" href="editProduct/{{$product->id}}">Edit</a></td>
        <td><a class="btn btn-dark" href="deleteProduct/{{$product->id}}">Delete</a></td>
    </tr>
  </tbody>
  @endforeach
</table>

@include('partials.footer')