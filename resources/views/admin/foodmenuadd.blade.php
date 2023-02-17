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
    <div class="container" style="padding: 50px;">

        <form action="{{ url("/foodmenu/create") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="mb-1" for="">Title</label>
                <input type="text" name="title" class="form-control text-white" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Price</label>
                <input type="number" name="price" class="form-control text-white" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Description</label>
                <textarea name="desc" class="form-control text-white" placeholder="Explain about this menu ..." required></textarea>
            </div>
            <div>
                <input type="submit" value="Save" class="btn btn-outline-primary">
            </div>


        </form>
    </div>


    </div>
    @include('admin.adminscript')
  </body>
</html>
