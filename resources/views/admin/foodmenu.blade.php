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
        <div class="container" style="padding: 50px;">
            <a href="{{ url("/foodmenu/add") }}" class="btn btn-outline-primary mb-4">Add New</a>

            <table class="my-5 table text-white table-image">
                <tr class="">
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>

                @foreach ($data as $food)
                    <tr>
                        <td>{{ $food->title }}</td>
                        <td>${{ $food->price }}</td>
                        <td>{{ $food->description }}</td>
                        <td><img src="/foodimage/{{ $food->image }}" style="height: 150px; width: 150px" alt="image" ></td>
                        <td><a href="{{ url("/foodmenu/edit/$food->id") }}" class="btn btn-outline-warning">EDIT</a>
                            <a href="{{ url("/foodmenu/delete/$food->id") }}" class="btn btn-outline-danger" onClick='return confirm("Are you sure to delete this menu?")'>DELETE</a>
                        </td>
                    </tr>
                @endforeach

            </table>





        </div>


    </div>
    @include('admin.adminscript')
  </body>
</html>
