<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-md-4 my-4 p-5">
                @forelse ($announcements as $announcement)
                    <div class="card" style="width: 18rem;">
                        <img src="https://fastly.picsum.photos/id/1037/200/200.jpg?hmac=MMp-F1917NlyyHn_Bd0ZS6iR3v1-FLpGFkxYeQguinM" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->description }}</p>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <a href="{{ route('announcements.show', compact('announcement')) }}"
                                class="btn btn-primary">Dettagli</a>
                        </div>
                    </div>
                @empty
                    <p>Non ci sono annunci</p>
            </div>
        </div>
        @endforelse
    </div>
</x-layout>
