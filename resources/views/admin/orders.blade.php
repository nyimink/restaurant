<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    @include('admin.admincss')

  </head>
  <body>

    <div class="container-scroller">
    @include('admin.navbar')

        <div class="container" style="padding: 50px">
            <form action="{{ url("/search") }}" method="get" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="bg-dark" placeholder="Name, address or food menu" style="width: 500px">
                    <button type="submit" class="btn btn-outline-light"><i class="fa fa-search"></i></button>
            </div>
            </form>


            <table class="text-white table table-dark">
                <tr class="table-active">
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Food Name</td>
                    <td>Price($)</td>
                    <td>Quantity</td>
                    <td>Amount</td>
                </tr>

                @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->foodname }}</td>
                        <td>${{ $data->price }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>${{ $data->price * $data->quantity }}</td>
                    </tr>
                @endforeach
            </table>


        </div>


    </div>
    @include('admin.adminscript')
  </body>
</html>
