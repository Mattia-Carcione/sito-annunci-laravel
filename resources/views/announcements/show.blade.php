<x-layout>
    @if (session()->has('message'))
                <div class="flex flex-row justify-content-center alert alert-success" style="padding-top: 85px">
                    {{session('message') }}
                </div>
            @endif
    <div class="container mt-5 pt-3 ">
        <h1 class="pt-5 text-center">{{__('ui.details')}}</h1>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <div class="row bg-danger">
            <section class="product col-12">
                <div >
                    <div id="carouselExampleFade" class="carousel slide carousel-fade">
                        @if ($announcement->images)
                            <div class="carousel-inner ">
                                @foreach ($announcement->images as $image)
                                    <div class="carousel-item  @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(600,400) }}" class="d-block"
                                            alt="...">
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

                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleFade" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="product__info col-6 mx-5">
                    <div>
                        <div class="title">
                            <h4 class="fw-bolder">{{__('ui.title')}}</h4 class="fw-bolder">
                            <p>{{ $announcement->title }}</p>
                        </div>
                        <div class="price">
                            <h4 class="fw-bolder">{{__('ui.price')}}</h4 class="fw-bolder">
                            € <span>{{ $announcement->price }}</span>
                        </div>

                        <div class="description">
                            <h4 class="fw-bolder">{{__('ui.description')}}</h4 class="fw-bolder">
                            <P>{{ $announcement->description }}</P>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</x-layout>
