<x-layout>
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="text-center">
                        <h2 class="fw-bolder">Esplora la Categoria: {{ $category->name }}</h2>

                        <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur
                            adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center min-vh-100">
                    <h1></h1>
                </div>


                <a id="view-code" href="https://codepen.io/virgilpana/pen/RNYQwB" target="_blank">VIEW CODE</a>
                <div id="make-3D-space" class="d-flex justify-content-around">
                    <div id="product-card" class="row gx-5">
                        @forelse ($category->announcements as $announcement)
                            <div id="product-front" class="col-lg-4 mb-5">

                                <div class="shadow"></div>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png"
                                    alt="" />
                                <div class="image_overlay"></div>
                                <div id="view_details">View details</div>
                                <div class="stats">
                                    <div class="stats-container">
                                        <span class="product_price">{{ $announcement->price }}€</span>
                                        <span class="product_name">{{ $announcement->title }}</span>
                                        <span class="product_name">Descrizione: {{ $announcement->description }}</span>
                                        <p class="card-footer my-5">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            @empty
                <div>
                    <h2>Non sono presenti Annunci per questa categoria</h2>
                    <h3>Pubblicane uno: <a href="{{ route('announcements.create') }}" class="btn btn-success">Nuovo
                            Annuncio</a>
                    </h3>
                </div>
                @endforelse


                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            </div>
        </div>
    </section>
</x-layout>
