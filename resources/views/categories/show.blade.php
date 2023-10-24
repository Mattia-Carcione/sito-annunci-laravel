<x-layout>
    <section class="py-5">
        <div class="container px-5 my-5">
            <h1 class="fw-bolder text-center pt-5">Esplora la Categoria: {{ $category->name }}</h1>
            <hr>
            <div class="row justify-content-center pt-5">


                @forelse ($category->announcements->where('is_accepted', true) as $announcement)
                    <div class="product-card col-12 col-md-4 m-2">
                        @if ($announcement->created_at->diffInHours(now()) <= 24)
                            <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                        @endif
                        <img class="img-fluid"
                            src="https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"
                            alt="">
                        <div class="product-details">
                            <span class="product-catagory">{{ $announcement->category->name }}</span>
                            <h4><a style="color: #5478F0"
                                    href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                            </h4>
                            <p>
                                {{ $announcement->description }}
                            </p>
                            <p class="card-footer my-2">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
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
                        <h3 class="text-center pt-4">Non sono presenti Annunci per questa categoria</h3>
                        <h4 class="text-center pt-3">Pubblicane uno: <br>
                            <a href="{{ route('announcements.create') }}" class="btn mt-3" style="background-color: #C5DCDC">Nuovo
                                Annuncio</a>
                        </h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
