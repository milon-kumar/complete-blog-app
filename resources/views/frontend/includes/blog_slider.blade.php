<section>
    <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
            @foreach($blogs as $blog)
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <img class="card-img rounded-0" src="{{asset('/uploads/'.$blog->image)}}" alt="">
                    </div>
                    <div class="blog__slide__content">
                        <a class="blog__slide__label" href="#">{{$blog->category->name}}</a>
                        <h3><a href="#">{{$blog->title}}</a></h3>
                        <p>{{$blog->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
