<x-layout>
    <section class="py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5 justify-content-center">
                <h2 class="fw-bolder text-center">Esplora la Categoria: {{ $category->name }}</h2>

                <a id="view-code" target="_blank">VIEW CODE</a>

                <div id="make-3D-space">
                    @forelse ($category->announcements as $announcement)

                        <div id="product-card">
                            <div id="product-front">
                                <div class="shadow"></div>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png"
                                    alt="" />
                                <a href="{{ route('announcements.show', compact('announcement')) }}">
                                    <div id="view_details">View details</div>
                                </a>

                                <div class="stats">
                                    <div class="stats-container">
                                        <span class="product_price">$39</span>
                                        <span class="product_name">Adidas Originals</span>
                                        <p>Men's running shirt</p>


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


            </div>
        </div>
    </section>
</x-layout>
