<x-layout>
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
                        <button class="buy--btn">ADD TO CART</button>
                    </div>
            </section>
        </div>
    </div>
</x-layout>
