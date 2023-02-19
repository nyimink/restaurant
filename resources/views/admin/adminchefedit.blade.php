<x-app-layout>

</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    @include('admin.admincss')

  </head>
  <body>

    <div class="container-scroller">
    @include('admin.navbar')
    <div class="container" style="padding: 50px">

        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="mb-1" for="">Name</label>
                <input type="text" name="name" class="form-control text-white" value="{{ $data->name }}" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Speciality</label>
                <input type="text" name="speciality" class="form-control text-white" value="{{ $data->speciality }}" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Image</label>
                <img src="/chefimage/{{ $data->image }}" alt="old profile picture" class="mb-2" style="width: 250px; height: 330px">
                <input type="file" name="image" value="{{ $data->image }}" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Phone</label>
                <input type="text" name="phone" value="{{ $data->phone }}" class="form-control text-white"  required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Email</label>
                <input type="text" name="email" value="{{ $data->email }}" class="form-control text-white" required>
            </div>
            <div>
                <input type="submit" value="Save" class="btn btn-outline-success">
            </div>
        </form>


    </div>

    </div>
    @include('admin.adminscript')
  </body>
</html>
