<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  @include('admin.adminCss')
  <body>
    <div class="container-scroller">
    @include('admin.navbar')
     
    <table class="table table-bordered w-50 h-50 mt-5">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Number of Guest</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->guest}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->message}}</td>
            </tr>
        @endforeach
    </table>

    </div>
    @include('admin.adminJs')
  </body>

</html>