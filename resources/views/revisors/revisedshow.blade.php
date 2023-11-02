<x-dashboard>
    @if (session()->has('success'))
        <div class="flex flex-row justify-content-center alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('fail'))
        <div class="flex flex-row justify-content-center alert alert-success">
            {{ session('fail') }}
        </div>
    @endif
    <h1 class="pt-4 text-center">Modifica Scelta</h1>
    <hr>
    <div class="container mt-1 pt-1 min-vh-100">
        <div class="row">
            <section class="product col-12">
                <div>
                    <div class="controls">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade">
                            @if ($announcement->images)
                                <div class="carousel-inner">
                                    @foreach ($announcement->images as $image)
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(600, 400) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>

                                </div>
                            @endif

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="product__info col-6 mx-5">
                    <div>
                        <div class="title">
                            <h4 class="fw-bolder">Titolo</h4>
                            <p>{{ $announcement->title }}</p>
                        </div>
                        <div class="price">
                            <h4 class="fw-bolder">Prezzo</h4>
                            € <span>{{ $announcement->price }}</span>
                        </div>

                        <div class="description">
                            <h4 class="fw-bolder">Descrizione</h4>
                            <P>{{ $announcement->description }}</P>
                        </div>
                    </div>
                    @if ($announcement->is_accepted == true)
                        <form action="{{ route('revisor.reject_announcement', ['announcement' => $announcement]) }}"
                            style="display:inline" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">Rifiuta</button>
                        </form>
                    @else
                        <form action="{{ route('revisor.accept_announcement', ['announcement' => $announcement]) }}"
                            style="display:inline" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Accetta</button>
                        </form>
                    @endif
                </div>
            </section>
        </div>

    </div>

</x-dashboard>
