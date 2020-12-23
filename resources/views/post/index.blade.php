@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card text-white bg-primary mb-3">{{ __(' اضافه موضوع') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div id="success" class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form action="{{ route('post.store') }}" method="post" dir="rtl">

                            {{ csrf_field() }}

                            <div class="form-group text-right">
                                <label for="experiencesla"> اضافه العنوان :</label>
                                <input type="text"
                                       class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}  "
                                       id="experiencesla" name="title" placeholder="  العنوان ">
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group text-right">
                                <label for="experiencesla"> اضافه الموضوع :</label>
                                <div class="form-group">

                                    <textarea class="form-control" name="body" rows="3"></textarea>
                                </div>
                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group ">
                                <button id="btt" type="submit" name="send"
                                        class="btn btn-outline-danger btn-sm float-right">ارسل
                                </button>
                            </div>


                            {{--       ######## bootstrap loading spinner on button ############--}}
                            <script>
                                $(document).ready(function () {
                                    $('#btt').on('click', function () {
                                        var $this = $(this);
                                        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                                        if ($(this).html() !== loadingText) {
                                            $this.data('original-text', $(this).html());
                                            $this.html(loadingText);
                                        }
                                        setTimeout(function () {
                                            $this.html($this.data('original-text'));
                                        }, 2000);
                                    });
                                })
                            </script>
                            {{--   ######## bootstrap loading spinner on button  End############--}}

                        </form>
                    </div>
                </div>
                <br>
                <br>

                @foreach ($post as $pos)
                    <br>
                    <div class="card">
                        <p class="card-header card text-white bg-primary ">{{ $pos->title }}</p>
                        <div class="card-body">
                            <h5><span class="badge badge-danger">{{ ucfirst($pos->user->name) }}
                                  {{$pos->created_at}} </span></h5>
                            <p class="card-text">{{ $pos->body }}</p>
                            <br>

                            <form method="post" action="{{ route('comment.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comm" class="form-control"/>
                                    <input type="hidden" name="post_id" value="{{ $pos->id }}"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-success btn-sm" value="اضافة تعليق"/>
                                </div>
                            </form>

                            <p>Comments Count: {{$pos->commen->count()}}</p>
                            {{--##  note ->commen تخص العلاقه في الموديل ##--}}


                            @foreach($pos->commen as $comment)
                                <div class="display-comment">
                                    <br>
                                    <span class="badge badge-secondary"> {{ ucfirst($comment->user->name )}} تعليقات </span>
                                    <p>{{ $comment->comm }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <script>
        setTimeout(function () {
            $('#success').fadeOut('fast');
        }, 3000);
    </script>

    <script>    //مسح الداتا لزر الرجوع من الخلف
        // previous page should be reloaded when user navigate through browser navigation
        // for mozilla
        window.onunload = function () {
        };
        // for chrome
        if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
            location.reload();
        }
    </script>




@endsection
