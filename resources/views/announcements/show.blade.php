<x-layout>
    <div class="container mt-5 pt-5 min-vh-100">
        <h1 class="pt-5 text-center">Dettagli</h1>
        <hr>
        <div class="row bg-danger">
            <section class="product col-12">
                <div>
                    <div class="controls">
                        <img class="img-fluid"
                        src="https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"
                        alt="green apple slice">
                    </div>
                </div>
                <div class="product__info col-6 mx-5">
                    <div>
                        <div class="title">
                            <h3>Titolo</h3>
                            <p>{{ $announcement->title }}</p>
                        </div>
                        <div class="price">
                            <h3>Prezzo</h3>
                            € <span>{{ $announcement->price }}</span>
                        </div>

                        <div class="description">
                            <h3>Descrizione</h3>
                            <P>{{ $announcement->description }}</P>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</x-layout>
