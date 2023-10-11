<x-layout>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

    <a id="view-code" href="https://codepen.io/virgilpana/pen/RNYQwB" target="_blank">VIEW CODE</a>

    <div id="make-3D-space">
        <div id="product-card">
            @forelse ($category->announcements as $announcement)
                <div id="product-front">
                    <div class="shadow"></div>
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
                    <div class="image_overlay"></div>
                    <div id="view_details">View details</div>
                    <div class="stats">
                        <div class="stats-container">
                            <span class="product_price">{{$announcement->price}}</span>
                            <span class="product_name">{{$announcement->title}}</span>
                            <p>Men's running shirt</p>


                        </div>
                    </div>
                </div>

        </div>
    </div>
@empty
<div class="col-12">
    <p></p>
</div>
    @endforelse


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</x-layout>
