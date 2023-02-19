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

            <form action="{{ url("/chefs/create") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="mb-1" for="">Name</label>
                    <input type="text" name="name" class="form-control text-white" required>
                </div>
                <div class="mb-4">
                    <label class="mb-1" for="">Speciality</label>
                    <input type="text" name="speciality" class="form-control text-white" required>
                </div>
                <div class="mb-4">
                    <label class="mb-1" for="">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="mb-1" for="">Phone</label>
                    <input type="text" name="phone" class="form-control text-white" required>
                </div>
                <div class="mb-4">
                    <label class="mb-1" for="">Email</label>
                    <input type="text" name="email" class="form-control text-white" required>
                </div>
                <div>
                    <input type="submit" value="Add" class="btn btn-outline-primary">
                </div>
            </form>


        </div>

    </div>
    @include('admin.adminscript')
  </body>
</html>
