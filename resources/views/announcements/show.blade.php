<x-layout>
    @if (session()->has('message'))
        <div class="flex flex-row justify-content-center alert alert-success" style="padding-top: 85px">
            {{ session('message') }}
        </div>
    @endif


 

    <div class="container mt-5 pt-5 mb-5">
        <h1 class="text-center mt-4 fw-bolder">{{__('ui.detail')}}</h1>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row">
            <div class="col-lg-6 pe-lg-6">
                <div class="row">
                    <div class="col-12">

                        <h1 class="fs-3 mb-2"><span>{{ $announcement->category->name }} - </span>
                            {{ $announcement->title }}</h1>
                        <div id="carouselExampleFade" class="carousel slide carousel-fade">
                            @if ($announcement->images)
                                <div class="carousel-inner">
                                    @foreach ($announcement->images as $image)
                                        <div class="carousel-item  @if ($loop->first) active @endif">
                                            <img src="{{ $image->getUrl(600, 400) }}" class="d-block" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"
                                            class="d-block w-100" alt="...">
                                    </div>

                                </div>
                            @endif
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="prev" style="margin-left: -3%">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="next" style="margin-right: 2.5%">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="sticky-top mt-4 pt-5">
                    @if ($announcement->created_at->diffInHours(now()) <= 24)
                        <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                    @endif

                    <h4 class="fw-bold">{{ __('ui.price') }}:</h4>
                    <p class="text-600">€{{ $announcement->price }}</p>

                    <h4 class="mt-4 fw-bold">{{ __('ui.description') }}:</h4>
                    <p class="text-600 description-overflow descrizione" id="descrizione">{{ $announcement->description }}</p>
                    <button class="button btn btn-hover btn-sm btn-hidden" id="mostraDescrizione">{{ __('ui.showMore') }}</button>

                    <h4 class="mt-4 fw-bold">{{ __('ui.date') }}</h4>
                    <p class="text-600">{{ $announcement->created_at->format('d/m/Y') }}</p>
                    <div class="d-grid mt-4"><a class="button btn btn-hover" href="{{ route('categories.show', $announcement->category) }}">{{ __('ui.correlatedArticle') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
