<div class="hero inner-page" style="background-image: url({{asset('assets/images/hero_1_a.jpg')}});">

    <div class="container">
        <div class="row align-items-end ">
            <div class="col-lg-12">

                <div class="intro">
                    <h1><strong>{{$car->carTitle}}</strong></h1>
                    <div class="pb-4"><strong class="text-black">Posted on {{date('M d Y'), strtotime($car->created_at)}}</strong></div>
                </div>

            </div>
        </div>
    </div>
</div>
