<x-dashboard>
    <h1>{{ $announcements_to_check ? 'Ecco l\'annuncio da revisionare' : 'Non ci sono annunci da revisionare' }}</h1>
    @if ($announcements_to_check)
        <div class="container mt-5 pt-5">
            <h1 class="pt-5 text-center">Dettagli</h1>
            <div class="row justify-content-center">
                <section class="product">
                    <div class="product__photo">
                        <div class="photo-container">
                            <div class="photo-main">
                                <div class="controls">
                                    <i class="material-icons">share</i>
                                    <i class="material-icons">favorite_border</i>
                                </div>
                                <img src="https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"
                                    alt="green apple slice">
                            </div>
                        </div>
                    </div>
                    <div class="product__info">
                        <div class="title">
                            <h1>{{ $announcements_to_check->title }}</h1>
                        </div>
                        <div class="price">
                            € <span>{{ $announcements_to_check->price }}</span>
                        </div>

                        <div class="description">
                            <h3>DESCRIZIONE</h3>
                            <P>{{ $announcements_to_check->description }}</P>
                            <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcements_to_check])}}" style="display:inline" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcements_to_check])}}" style="display:inline" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                        </div>
                </section>
            </div>
        </div>
    @endif
</x-dashboard>
