<x-layout>
    <h1 class="mt-5">Nome profilo: {{ Auth::user()->name }}</h1>
    <h1 class="mt-5">Email: {{ Auth::user()->email }}</h1>
    <span>Gli annunci che hai pubblicato sono:</span>
    <div class="container">

        <div class="row justify-content-center mb-3 p-4">
            @foreach (Auth::user()->announcements as $announcement)
                <div class="product-card col-12 col-md-4 m-2" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="2000">
                    @if ($announcement->created_at->diffInHours(now()) <= 24)
                        <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                    @endif
                    <a href="{{ route('announcements.show', $announcement) }}">
                        <img src="{{ !$announcement->images()->get()->isEmpty()? $announcement->images()->first()->getUrl(300, 300): 'https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg' }}"
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

    </div>

</x-layout>
