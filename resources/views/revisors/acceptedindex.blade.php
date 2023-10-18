<x-dashboard>
    <a href="{{route('revisor.index')}}" class="btn btn-outline-dark">Visualizza annunci da revisionare</a>
    <h1>{{ $announcement ? 'Ecco l\'ultimo annuncio accettato' : 'Non ci sono annunci accettati' }}</h1>
 
    @if ($announcement)
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
                            <h1>{{ $announcement->title }}</h1>
                        </div>
                        <div class="price">
                            € <span>{{ $announcement->price }}</span>
                        </div>

                        <div class="description">
                            <h3>DESCRIZIONE</h3>
                            <P>{{ $announcement->description }}</P>
                        @if ($announcement->is_accepted==true)

                            <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement])}}" style="display:inline" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger">Rifiuta</button>
                            </form>
                            
                        @else

                            <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement])}}" style="display:inline" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Accetta</button>
                            </form>
                            
                        @endif   
                           
                        </div>
                </section>
            </div>
        </div>
    @endif

    
</x-dashboard>