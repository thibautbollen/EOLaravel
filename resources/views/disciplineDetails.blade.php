@extends('template.app')
@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-top">
                <div class="col-md-12 ">
                    <div class="float-start m-4">
                        <img class="m-4" width="600px"
                             src="{{$discipline->headerPhoto->getFile()->getUrl()}}" alt="..."/>
                    </div>
                    <div class="">
                        <h1 class="display-5 fw-bolder">{{$discipline->title}}</h1>
                        <div class="fs-5 mb-5">
                        </div>
                        <div class="lead">
                            {!!$renderer->render($discipline->textDisciplinePage)!!}
                        </div>
                        <div class="mt-4">
                            <h3>Members</h3>
                            {!! $renderer->render($discipline->members) !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-top">
                <div>

                </div>
            </div>
        </div>

    </section>

@endsection
