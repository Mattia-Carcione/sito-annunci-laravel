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

    @if ($announcements)
        <h1 class="text-center">Ecco l'annuncio da revisionare</h1>
        <div class="container mt-5">
            <div class="row">
                <section class="product col-12">
                    <div>
                        <div class="controls">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                                @if ($announcements->images)
                                    <div class="carousel-inner">
                                        @foreach ($announcements->images as $image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                @if ($image->labels == null)
                                                    <p>Le immagini non sono state ancora elaborate, ricarica la pagina
                                                    </p>
                                                @else
                                                    <img src="{{ $image->getUrl(600, 400) }}" class="d-block w-100"
                                                        alt="...">
                                                @endif
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

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="flex-wrap:nowrap">
                        <div class="product__info col-6 mx-5 " style="margin-right: 0px !important">
                            <div>
                                <div class="title">
                                    <h4 class="fw-bolder">Titolo</h4>
                                    <p>{{ $announcements->title }}</p>
                                </div>
                                <div class="price">
                                    <h4 class="fw-bolder">Prezzo</h4>
                                    € <span>{{ $announcements->price }}</span>
                                </div>

                                <div class="description">
                                    <h4 class="fw-bolder">Descrizione</h4>
                                    <P>{{ $announcements->description }}</P>
                                </div>
                            </div>
                            <form
                                action="{{ route('revisor.accept_announcement', ['announcement' => $announcements]) }}"
                                style="display:inline" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            <form
                                action="{{ route('revisor.reject_announcement', ['announcement' => $announcements]) }}"
                                style="display:inline" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                        </div>
                        <div class="col-md-6 p-0">

                            <div class="card-body">
                                <h4 class="tc-accent">Revisioni Immagini</h4>
                                <p>Adulti: <span class="{{ $image->adult }}"></span></p>
                                <p>Satira: <span class="{{ $image->spoof }}"></span></p>
                                <p>Medicina: <span class="{{ $image->medical }}"></span></p>
                                <p>Violenza: <span class="{{ $image->violence }}"></span></p>
                                <p>Contenuto Ammiccante: <span class="{{ $image->racy }}"></span></p>
                                <h5>Tags</h5>
                                @if (!($image->labels == null))
                                    <p>
                                        @foreach ($image->labels as $label)
                                            {{ $label }}
                                        @endforeach
                                    </p>
                                @endif

                            </div>


                        </div>
                    </div>
                </section>
            </div>

        </div>
    @else
        <h1 class="text-center">Non ci sono annunci da revisionare</h1>
        <div class="align-items-center justify-content-center d-flex">
            <a href="{{ route('revisor.revised') }}" class="btn btn-outline-dark text-center">Visualizza tutti gli
                annunci revisionati</a>
        </div>

    @endif



</x-dashboard>
