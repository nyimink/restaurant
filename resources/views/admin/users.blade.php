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

        <div class="container" style="padding: 10px">
            <table class="table text-white">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->usertype == 0)
                            <td><a href="{{ url("/user/delete/$user->id") }}" style="text-decoration:none" class="btn btn-outline-danger" onClick='return confirm("Are you sure to delete this user?")'>DELETE</a>
                            </td>
                        @else
                            <td><a style="text-decoration:none" class="disabled btn btn-outline-danger">NOT ALLOWED</a></td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>


    </div>
    @include('admin.adminscript')
</body>

</html>
