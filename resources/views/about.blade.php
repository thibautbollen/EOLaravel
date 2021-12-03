@extends('template.app')
@section('content')
    <section>
        <div class="container px-4 px-lg-5 my-5 " id="aboutText">
            <div class="row gx-4 gx-lg-5 align-items-top">
                <div class=" col-md-12">
                    <div class="float-start m-4">
                        <img class="m-4" width="600px" src={{$image->getUrl()}} alt="..."/>
                    </div>
                    <div class="">
                        <h1 class="display-5 fw-bolder">{{$about->title}}</h1>
                        <div class="fs-5 mb-5">
                        </div>
                        <div class="">
                            {!!$text!!}
                        </div>
                    </div>
                </div>
            </div>
            <div id="members" class="mt-3">
                <h2 class="pb-3 text-decoration-underline">Members</h2>
                <div class="row">
                    @foreach($members as $member)
                        <div class="col-lg-4 my-3">
                            <img class="bd-placeholder-img rounded " style="object-fit:cover;" width="140" height="140"
                                 src={{$member->picture->getFile()->getUrl()}} role="img"
                                 aria-label="Placeholder: 140x140"
                                 preserveAspectRatio="xMidYMid slice" focusable="false"/>

                            <h4 class="text-muted">{{$member->description}}</h4>
                            <div class="mb-0" style="  display: block;
                              text-overflow: ellipsis;
                              word-wrap: break-word;
                              overflow: hidden;
                              max-height: 4.6em;
                              line-height: 1.8em">
                                <p class="fw-bold">{{$member->title}}</p>
                            </div>
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-1"><i class="fab fa-linkedin"></i>
                                </div>
                                <div class="col-1"><i class="fas fa-envelope"></i></div>
                                <div class="col-7"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
