@extends('layouts.master')

@section('meta_title') Medicina del Futuro @endsection

@section('content')
    <!-- Slider -->
    <section id="slider">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Slide-Carousel -->
                    <div class="carousel brands">
                        @inject('slides', 'App\Slide')
                        @foreach($slides->where('slider', 'home')->ordered()->get() as $slide)

                        <div class="c-wrap">
                            <div class="item">
                                <div class="bg">
                                    <img src="/photos/{{ $slide->image }}" alt="{{ $slide->title }}"/>
                                </div>
                                <div class="text white">
                                    <h3>
                                        <a href="{{ $slide->link }}">
                                            <small>{{ $slide->title }}</small>
                                            <span>{{ $slide->description }}</span>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /Slide-Carousel -->

                </div>
            </div>
        </div>
    </section>
    <!-- /Slider -->

    <div class="divider"></div>

    <hr style="border: solid #e6e6e6 1px;max-width: 1180px;margin: 4rem auto;">

    <div class="divider"></div>
    <section>
        <div class="container-fluid">
            <div class="row">
                @foreach($articles as $article)
                <div class="col-sm-6" style="padding:2rem">
                    <div class="block">
                            <h2>{{ $article->name }}</h2>
                            <a href="{{ route('article', [$article->category->slug, $article->slug]) }}">
                                <div class="photo_call" style="background-position-x: -100px;background-image: url('/photos/{{ $article->featuredImage()->url }}');">
                                </div>
                            </a>
                            <p style="margin-top: 10px;font-size: 19px;">{!! strip_tags(\Str::limit($article->text, 230)) !!} 
                                <a href="{{ route('article', [$article->category->slug, $article->slug]) }}" style="color: #929f3f">[...]</a>
                            </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <hr style="border: solid #e6e6e6 1px;max-width: 1180px;margin: 4rem auto;">
    <div class="divider"></div>
    
    <!-- /Intro -->
@endsection
