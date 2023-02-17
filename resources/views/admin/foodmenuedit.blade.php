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

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="mb-1" for="">Title</label>
                <input type="text" name="title" class="form-control text-white" value="{{ $data->title }}" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Price</label>
                <input type="number" name="price" class="form-control text-white" value="{{ $data->price }}" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Image</label>
                <img src="/foodimage/{{ $data->image }}" alt="old image" class="img-fluid mb-2" style="width: 200px; height: 200px">
                <input type="file" name="image" class="form-control" value="{{ $data->image }}" required>
            </div>
            <div class="mb-4">
                <label class="mb-1" for="">Description</label>
                <textarea name="desc" class="form-control text-white" placeholder="Explain about this menu ..." required>{{ $data->description }}</textarea>
            </div>
            <div>
                <input type="submit" value="Update" class="btn btn-outline-info">
            </div>


        </form>
    </div>
    </div>
    @include('admin.adminscript')
  </body>
</html>
