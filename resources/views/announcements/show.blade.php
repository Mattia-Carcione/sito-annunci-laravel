<x-layout>
    <div class="container mt-5 pt-5">
        <h1 class="pt-5 text-center">Dettagli</h1>
        <div class="row">
                <div class="col-12 col-md-12 my-4 d-flex justify-content-around align-items-center">
                    <div class="card" style="width: 18rem;">
                        <img src="https://fastly.picsum.photos/id/1037/200/200.jpg?hmac=MMp-F1917NlyyHn_Bd0ZS6iR3v1-FLpGFkxYeQguinM"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $announcement->title }}</h5>
                            <p class="card-text">{{ $announcement->description }}</p>
                            <p class="card-text">{{ $announcement->price }}</p>
                            <p class="card-text">Pubblicazione: {{ $announcement->created_at }}</p>
                            
                            <a href="{{ route('announcements.index')}}"
                                class="btn btn-primary">Index</a>
                        </div>
                    </div>
</x-layout>