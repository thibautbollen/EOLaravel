@extends('template.app')
@section('content')
    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-color: #000000;">
                    <img class="bd-placeholder-img" style="object-fit:cover; opacity: 0.8; background-color: #000000;"
                         width="100%" height="100%" src={{$home->photo1->getFile()->getUrl()}} aria-hidden="true"
                         preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"/>
                    </img>

                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>{{$home->title1}}</h1>
                            <p>{{$home->subTitle1}}</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-color: #000000;">
                    <img class="bd-placeholder-img img-fluid"
                         style="object-fit:cover; opacity: 0.8; background-color: #000000;" height="100%"
                         src={{$home->photo2->getFile()->getUrl()}} aria-hidden="true"
                        "/>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>{{$home->title2}}</h1>
                            <p>{{$home->subTitle2}}</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-color: #000000;">
                    <img class="bd-placeholder-img" style="object-fit:cover; opacity: 0.8; background-color: #000000;"
                         height="100%" src={{$home->photo3->getFile()->getUrl()}} aria-hidden="true"
                         preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"/>
                    </img>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>{{$home->title3}}</h1>
                            <p>{{$home->subTitle3}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                @foreach($disciplines as $discipline)
                    <div class="col-lg-4">
                        <img class="bd-placeholder-img rounded-circle" style="object-fit: cover;" width="140" height="140"
                             src="{{$discipline->logo->getFile()->getUrl()}}" role="img" aria-label="Placeholder: 140x140"
                             preserveAspectRatio="xMidYMid slice" focusable="false"/>


                        <h2>{{$discipline->title}}</h2>
                        <p>{!!$renderer->render($discipline->summaryHome)!!}</p>
                        <p><a class="btn btn-outline-dark" href=/disciplines/{{$discipline->title}}>Go to
                                {{$discipline->title}} &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                @endforeach

            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">

                    <h2 class="featurette-heading my-auto">{{$about->title}}</h2>
                    <p class="lead">{!! $aboutText !!}</p>
                    <p class="mt-5"><a class="btn btn-outline-dark" href=/About>Read more &raquo;</a></p>

                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                         height="500" src={{$about->pictureHomePage->getFile()->getUrl()}} role="img"
                         preserveAspectRatio="xMidYMid slice" focusable="false"></img>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">{{$home->membersText}}</h2>
                    <div class="align-right">
                        {!! $renderer->render($home->membersTextHome)!!}

                    </div>
                    <p><a class="btn btn-outline-dark" href=/members>Read more &raquo;</a></p>

                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"
                         height="500" src={{$home->membersImageHome->getFile()->getUrl()}} role="img"
                         aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"/>

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row">
                <h2>News</h2>
                    <div class="col-lg-3">
                        <img class="bd-placeholder-img rounded " style="object-fit:cover;" width="140" height="140"
                             src={{$news[0]->newsImage->getFile()->getUrl()}} role="img"
                             aria-label="Placeholder: 140x140"
                             preserveAspectRatio="xMidYMid slice" focusable="false"/>

                        <h2>{{$news[0]->title}}</h2>
                        <div class="mb-3" style="  display: block;
                              text-overflow: ellipsis;
                              word-wrap: break-word;
                              overflow: hidden;
                              max-height: 4.6em;
                              line-height: 1.8em">
                            <p>{!!$renderer->render($news[0]->articlesText)!!}</p>
                        </div>
                        <p><a class="btn btn-outline-dark" href=/news/{{$news[0]->publishDate}}>Read
                                more
                                &raquo;</a></p>
                    </div>
                    <div class="col-lg-3">
                        <img class="bd-placeholder-img rounded " style="object-fit:cover;" width="140" height="140"
                             src={{$news[1]->newsImage->getFile()->getUrl()}} role="img"
                             aria-label="Placeholder: 140x140"
                             preserveAspectRatio="xMidYMid slice" focusable="false"/>

                        <h2>{{$news[1]->title}}</h2>
                        <div class="mb-3" style="  display: block;
                              text-overflow: ellipsis;
                              word-wrap: break-word;
                              overflow: hidden;
                              max-height: 4.6em;
                              line-height: 1.8em">
                            <p>{!!$renderer->render($news[1]->articlesText)!!}</p>
                        </div>
                        <p><a class="btn btn-outline-dark" href=/news/{{$news[1]->publishDate}}>Read
                                more
                                &raquo;</a></p>
                    </div>
                    <div class="col-lg-3">
                        <img class="bd-placeholder-img rounded " style="object-fit:cover;" width="140" height="140"
                             src={{$news[2]->newsImage->getFile()->getUrl()}} role="img"
                             aria-label="Placeholder: 140x140"
                             preserveAspectRatio="xMidYMid slice" focusable="false"/>

                        <h2>{{$news[2]->title}}</h2>
                        <div class="mb-3" style="  display: block;
                              text-overflow: ellipsis;
                              word-wrap: break-word;
                              overflow: hidden;
                              max-height: 4.6em;
                              line-height: 1.8em">
                            <p>{!!$renderer->render($news[2]->articlesText)!!}</p>
                        </div>
                        <p><a class="btn btn-outline-dark" href=/news/{{$news[2]->publishDate}}>Read
                                more
                                &raquo;</a></p>
                    </div>
                    <div class="col-lg-3">
                        <img class="bd-placeholder-img rounded " style="object-fit:cover;" width="140" height="140"
                             src={{$news[3]->newsImage->getFile()->getUrl()}} role="img"
                             aria-label="Placeholder: 140x140"
                             preserveAspectRatio="xMidYMid slice" focusable="false"/>

                        <h2>{{$news[3]->title}}</h2>
                        <div class="mb-3" style="  display: block;
                              text-overflow: ellipsis;
                              word-wrap: break-word;
                              overflow: hidden;
                              max-height: 4.6em;
                              line-height: 1.8em">
                            <p>{!!$renderer->render($news[3]->articlesText)!!}</p>
                        </div>
                        <p><a class="btn btn-outline-dark" href=/news/{{$news[3]->publishDate}}>Read
                                more
                                &raquo;</a></p>

                </div><!-- /.col-lg-4 -->


            </div><!-- /.row

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->

    </main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>




@endsection
