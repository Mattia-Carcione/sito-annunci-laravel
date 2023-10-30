<x-layout>
    @if (session()->has('message'))
                <div class="flex flex-row justify-content-center alert alert-success" style="padding-top: 85px">
                    {{session('message') }}
                </div>
            @endif
    <section class="py-5">
        <div class="container px-5 my-5">
            <h1 class="fw-bolder text-center pt-5">{{__('ui.explore')}} {{ $category->name }}</h1>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center pt-5">


                @forelse ($category->announcements->where('is_accepted', true) as $announcement)
                    <div class="product-card col-12 col-md-4 m-2">
                        @if ($announcement->created_at->diffInHours(now()) <= 24)
                            <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                        @endif
                        <img class="img-fluid"
                        src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,300) : "https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"}}"
                            alt="">
                        <div class="product-details">
                            <span class="product-catagory">{{ $announcement->category->name }}</span>
                            <h4><a style="color: #5478F0"
                                    href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                            </h4>
                            <p class="description-overflow descrizione" id="descrizione">
                                {{ $announcement->description }}
                            </p>
                            <span href="" class="btn-hidden">{{__('ui.showMore')}}</span>
                           
                            <p class="card-footer my-2">{{__('ui.date')}} {{$announcement->created_at->format('d/m/Y')}}   {{__('ui.author')}} {{$announcement->user->name ?? ''}}</p>
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
                        <h4 class="text-center pt-2">{{__('ui.noAnnouncements')}}</h4>
                        <h4 class="text-center pt-3">{{__('ui.announcementCreate')}}<br>
                            <a href="{{ route('announcements.create') }}" class="btn mt-3" style="background-color: #C5DCDC">{{__('ui.publish')}}</a>
                        </h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
