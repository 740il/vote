@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><small>عنوانين التصويت</small></th>
                            <th scope="col"><small> كاتب التصويت</small></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($question as $key => $q)
                        <tr>
                            <th scope="row">{{++$key}}</th>

                            <td>
{{--                                {{$q->question}}--}}
                                <a href="{{ route('question.show', $q->id ) }}"> {!! strip_tags(trans($q->question)) !!}</a>

                            </td>

                            <td>
                                <a class="text-danger" href="{{ route('question.show' , $q->id) }}">  {{ $q->user->name }}</a>


                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>



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
