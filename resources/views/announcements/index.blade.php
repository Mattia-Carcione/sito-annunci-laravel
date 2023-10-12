<x-layout>
    @forelse ($announcements as $announcement )
        <div class="col-12 col-md-4 my-4 m-5">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$announcement->title}}</h5>
                  <p class="card-text">{{$announcement->description}}</p>
                  <p class="card-text">{{$announcement->price}}</p>
                  <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary">Dettagli</a>
                </div>
              </div>
        </div>
    @empty
    <div class="col-12 col-md-4 my-4">
        <p>Non ci sono annunci</p>
    </div>
    @endforelse
</x-layout>