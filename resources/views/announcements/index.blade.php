<x-layout>
    <div class="container py-5" style="margin-top: 2%; height:auto" >
        <h1 class="pt-5 text-center">{{__('ui.allAnnouncements')}}</h1>
        <hr>
        <div class="row justify-content-center mb-3 p-4">
            @forelse ($announcements as $announcement)
                <div class="product-card me-2 mt-5" style="width: 95%;">
                    @if ($announcement->created_at->diffInHours(now()) <= 24)
                        <div class="badge rounded-pill mb-2" style="background-color: #5478F0;">New</div>
                    @endif

                    <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : "https://www.venetoformazione.it/wp-content/uploads/2022/02/ottimizzare-immagini-display-retina.jpg"}}"
                        alt="" class="img-fluid">
                    <div class="product-details">
                        <span class="product-catagory">{{ $announcement->category->name }}</span>
                        <h4><a style="color: #5478F0"
                                href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                        </h4>
                        <p>
                            {{ $announcement->description }}
                        </p>
                        <p class="card-footer my-2">{{__('ui.date')}} {{$announcement->created_at->format('d/m/Y')}} - {{__('ui.author')}} {{$announcement->user->name ?? ''}}</p>
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
                <p>{{__('ui.noAnnouncement')}}</p>
            @endforelse
        </div>
        {{ $announcements->links() }}

    </div>
</x-layout>
