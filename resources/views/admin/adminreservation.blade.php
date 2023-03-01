<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.admincss')

  </head>
  <body>

    <div class="container-scroller">
    @include('admin.navbar')
        <div class="container" style="padding: 50px">

            <table class="table text-white">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>No. of Guest</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Message</th>
                    <th></th>
                </tr>

                @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->guest }}</td>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->time }}</td>
                        <td>{{ $data->message }}</td>
                        <td><a href="{{ url("/reservation/delete/$data->id") }}" class="btn btn-outline-primary" onClick='return confirm("Are you sure to delete?")'>Served</a></td>
                    </tr>
                @endforeach

            </table>



        </div>


    </div>
    @include('admin.adminscript')
  </body>
</html>
