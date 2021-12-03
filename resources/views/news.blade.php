@extends('template.app')
@section('content')
    <div class="  mx-lg-5 pt-5 mt-4 ">
        @foreach($newsArticles as $news )
            <div class="card  my-lg-3">
                <div class="card-header text-end text-muted">
                    {{date('d-m-Y', strtotime($news->publishDate))}}

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 ml-3">
                            <img class="rounded"  src="{{$news->newsImage->getFile()->getUrl()}}" style="width: 300px; height: 200px; object-fit: cover;" alt=""/>
                        </div>
                        <div class="col-lg-9">
                        <h5 class="card-title text-start ">Special title treatment</h5>
                        <p class="card-text text-start">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
