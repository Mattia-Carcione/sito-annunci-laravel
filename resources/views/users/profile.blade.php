<x-layout>
    <section style="background-color: whitesmoke;">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-1">Email: {{ Auth::user()->email }}</p>
                            <p class="text-muted mb-4">Data registrazione: {{ Auth::user()->created_at->format('Y-m-d') }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Crea un annuncio!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <h1 class="pt-5 text-center fw-bolder">Ecco gli annunci che hai pubblicato</h1>
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    <div class="container">

        <div class="row justify-content-center mb-3 p-4">
            @foreach ($announcements as $announcement)
                <div class="product-card col-12 col-md-4 m-2" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    @if ($announcement->created_at->diffInHours(now()) <= 24)
                        <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                    @endif
                    <a href="{{ route('announcements.show', $announcement) }}">
                        <img id="img-card" src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(300, 300): 'https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg' }}"
                            alt="" class="img-fluid"></a>
                    <div class="product-details">
                        <span class="product-catagory">{{ $announcement->category->name }}</span>
                        <h4><a style="color: #5478F0"
                                href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                        </h4>
                        <p class="description-overflow descrizione" id="descrizione">
                            {{ $announcement->description }}
                        </p>
                        <span href="" class="btn-hidden">{{ __('ui.showMore') }}</span>
                        <p class="card-footer my-2">{{ __('ui.date') }}
                            {{ $announcement->created_at->format('d/m/Y') }} {{ __('ui.author') }}
                            {{ $announcement->user->name ?? '' }}</p>
                        <div class="product-bottom-details">
                            <div class="product-price">€{{ $announcement->price }}</div>
                            <div class="product-links">
                                <a href=""><i class="fa fa-heart"></i></a>
                                <a href=""><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $announcements->links() }}

    </div>

</x-layout>
