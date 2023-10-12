<x-layout>
    <div class="container my-5 py-5 min-vh-100">
        <h1 class="pt-5 text-center">Annunci</h1>
        <div class="row justify-content-start mb-3">
            @forelse ($announcements as $announcement)
            <div class="product-card me-2" style="width: 95%;">
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
                <p>Non ci sono annunci</p>
            @endforelse
        </div>
        {{ $announcements->links() }}

    </div>
</x-layout>
