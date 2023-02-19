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
            <a href="{{ url("/chefs/add") }}" class="btn btn-outline-primary">Add Chef</a>

            @foreach ($data as $chef)
            <div class="card border-dark bg-dark my-3" style="max-width: 680px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="/chefimage/{{ $chef->image }}" class="img-fluid rounded-start" alt="profile picture" style="padding: 5px 0 5px 5px;">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title h4 text-uppercase fs-4 font-monospace text-primary">{{ $chef->name }}</h5>
                      <p class="card-text"><span class="fw-light fst-italic font-monospace text-info">Speciality: </span><span class="font-monospace">{{ $chef->speciality }}</span></p>
                      <p class="card-text"><span class="fw-light fst-italic font-monospace text-info">Phone: </span>{{ $chef->phone }}</p>
                      <p class="card-text"><span class="fw-light fst-italic font-monospace text-info">Email: </span>{{ $chef->email }}</p>
                      <p class="card-text"><small class="text-muted">{{ $chef->created_at->diffForHumans() }}</small></p>
                    <div class="d-grid d-md-flex justify-content-md-end">
                      <a href="{{ url("/chefs/edit/$chef->id") }}" class="me-md-2 btn btn-outline-light">Detail</a>
                      <a href="{{ url("/chefs/delete/$chef->id") }}" class="me-md-2 btn btn-outline-danger">Delete</a>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach


        </div>

    </div>
    @include('admin.adminscript')
  </body>
</html>
