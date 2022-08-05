<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  @include('admin.adminCss')
  <body>
    <div class="container-scroller">
    @include('admin.navbar')

    <form action="{{url('/search')}}" method="GET">
       <input type="text" name="search" placeholder="Search">
       <input type="submit" value="Search" class="btn btn-success">
    </form>
     
    <table class="table table-bordered w-50 h-50 mt-5">
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->foodname}}</td>
                <td>${{$data->price}}</td>
                <td>{{$data->quantity}}</td>
                <td>${{$data->price * $data->quantity}}</td>
            </tr>
        @endforeach
    </table>

    </div>
    @include('admin.adminJs')
  </body>

</html>