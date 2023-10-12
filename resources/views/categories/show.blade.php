<x-layout>
    <section class="py-5">
        <div class="container px-5 my-5">
            <h2 class="fw-bolder text-center">Esplora la Categoria: {{ $category->name }}</h2>

            <div class="row justify-content-center">


                @forelse ($category->announcements as $announcement)
                    <div class="product-card col-12 col-md-4 m-2">
                        @if ($announcement->created_at->diffInHours(now()) <= 24)
                            <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                        @endif

                        <div class="product-tumb">
                            <img src="https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"
                                alt="">
                        </div>
                        <div class="product-details">
                            <span class="product-catagory">{{ $announcement->category->name }}</span>
                            <h4><a style="color: #5478F0"
                                    href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                            </h4>
                            <p>
                                {{ $announcement->description }}
                            </p>
                            <div class="product-bottom-details">
                                <div class="product-price">€{{ $announcement->price }}</div>
                                <div class="product-links">
                                    <a href=""><i class="fa fa-heart"></i></a>
                                    <a href=""><i class="fa fa-shopping-cart"></i></a>
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
