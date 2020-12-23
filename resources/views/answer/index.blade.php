@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">

                    <div class="card-header card text-white bg-primary mb-3 text-center">الكلية التقنية للبنات بجدة</div>
                    <div class="card-body">
                        @if (session('message'))
                            <div id="message" class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

{{--                        @if(!$questionr)--}}

{{--                        @else--}}
{{--                            لا يوج نتائج--}}
{{--                        @endif--}}



                        {{--                            @foreach( $qus as $q)--}}

                        {{--                                      {{$q->answers['answer']}}--}}
                        {{--                                      {{$q->answers['question_id']}}--}}
                        {{--                                      {{$q->answers['user_id']}}--}}

                        {{--                                {{ dd($q) }}--}}
                        {{--                            @endforeach--}}
                        {{--                            {{$qus->user_id}}--}}



                        {{--                        @forelse ( $question as $que)--}}

                        {{--                            <hr>--}}
                        {{--                            {{$que->user->name}}--}}
                        {{--                            <hr>--}}
                        {{--                            {{$que['question']}}--}}
                        {{--                            <hr>--}}
                        {{--                            {{$que->user->name}}  : user--}}
                        {{--                            <hr>--}}
                        {{--                            {{$que->question}}--}}

                        {{--                        @empty--}}
                        {{--                            <p class="text-sm-center">لا يوجد نتائج</p>--}}


                        {{--                        @endforelse--}}



                        {{--                            {{dd($all)}}--}}



                        {{--                                                @foreach ( $answ as $an)--}}

                        {{--                                                    {{$an->questionn['question']}}--}}
                        {{--                                                    <hr>--}}

                        {{--                                                    {{$an->name}}--}}


                        {{--                                                    <hr>--}}
                        {{--                                                    {{$an->vote['answer']}} non--}}


                        {{--                                                @endforeach--}}



{{--                            @foreach ( $answer as $an)--}}
{{--                                {{$an->answer}} <br>--}}
{{--                            @endforeach--}}

{{--                        @foreach (  $ans_qus as $an)--}}
{{--                            {{$an->answers['answer']}}--}}
{{--                        @endforeach--}}


                            @foreach ($questionr as $qq)
                                    {{$qq->note}}
                            @endforeach

                        @foreach ($questionr as  $quest )


                            <br>


                                <div class="card ">
                                    <p class="card-header text-white  bg-primary"> السؤال : {{$quest->note}}</p>
                                    <div class="card-body">
                                        <div class="text-right" dir="rtl">
                                            @if(isset($quest->note) )
                                                <div class="alert alert-info" role="alert"><small>
                                                        <span class="badge badge-warning">  ملاحضة:</span> {{ $quest->note}}</small>
                                                </div>
                                            @endif

                                        </div>

                                        <div class=" ml-auto">
                                            <p class="badge badge-danger text-left">ID: {{$quest->id}}</p> &nbsp;
                                            <p class="badge badge-secondary text-left"> Name: {{$quest->user->name}}</p> &nbsp;
                                            <br>
                                            <br>






                                            {{--                                <p>Comments Count: {{$pos->commen->count()}}</p>--}}
                                            {{--                                <h3>{{ count($answer->vote) }}</h3>--}}


                                            {{--                                {{ $postt}}--}}
                                            {{--                                {{ $aa}}--}}
                                            <br>





{{--                                            @foreach (  $vot as $an)--}}
{{--                                                {{($tootalbln) }} <br>--}}


{{--                                            <br>--}}
{{--                                                {{($tootalbln1) }} <br>--}}

{{--                                                {{ $vot->has($user->id) ? count($vot[$user->id]) : 0 }}--}}
{{--                                            @endforeach--}}

                                            {{-- ########### Start Progress First ############--}}
                                            {{-- @if( Auth::id() == $quest->user->id )--}}
                                            <div class="d-flex justify-content-between">
                                                <small class="orders"></small>
                                                <small class="orders  text-danger pb-1" style="font-size:xx-small"> {{$total_0}}% نسبة
                                                    مئوية </small>
                                                <small>عدد الاصوات بنعم
                                                    <span class="badge badge-secondary ">{{ $total_0numper}}</span></small>
                                            </div>

                                            <div class="progress justify-content-end">
                                                <div class="progress-bar bg-danger " role="progressbar"
                                                     style="width:  {{$total_0}}%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            {{-- ########### End Progress First############--}}

                                            <br>
                                            <br>
                                            {{-- ########### Start Progress The Second  ############--}}
                                            <div class="d-flex justify-content-between">
                                                <small class="orders"></small>
                                                <small class="orders  text-danger pb-1" style="font-size:xx-small"> {{$total_1}}% نسبة
                                                    مئوية </small>
                                                <small>عدد الاصوات بلا <span class="badge badge-secondary">{{$total_1numper}}</span></small>
                                            </div>

                                            <div class="progress justify-content-end">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: {{$total_1}}%" aria-valuemin="0" aria-valuemax="100"></div>

                                            </div>
                                            {{-- ########### The Second  End Progress   ############--}}
                                            {{-- @endif--}}
                                        </div>


                                        <form class="needs-validation" method="POST" novalidate>
                                            {{ csrf_field()}}

                                            <div class="text-right" dir="rtl">



{{--                                            @if(!Auth::user()->answers  ||  !Auth::id() == $quest->id )--}}
{{--                                                @if(!Auth::user()->answers  ||  Auth::id() == $quest->user->id )--}}
{{--                                                      @if(!Auth::user()->answers || Auth::id() == $quest->user->id )--}}
                                                    {{-- ###########  Radio Option Button value="0" الاختيار الاول ############--}}
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="answer"

                                                                   id="invalidCheck " value="0" required>
                                                            <input type="hidden" name="question_id" value="{{ $quest->id }}"/>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                {{$quest->OptionsOne }}
                                                            </label>
                                                            <div class="invalid-feedback">
                                                                يجب عليك اختيار احد الآمرين ! !
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- ###########  Radio Option Button value="0"  ############--}}

                                                    {{-- ###########  Radio Option Button value="1" الاختيار الثاني ############--}}
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="answer"
                                                                   id="invalidCheck" value="1" required>
                                                            <input type="hidden" name="question_id" value="{{ $quest->id }}"/>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                {{$quest->OptionsTwo }}

                                                            </label>
                                                            <div class="invalid-feedback">
                                                                يجب عليك اختيار احد الآمرين ! !
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- ###########  Radio Option Button value="0" الاختيار الثالث ############--}}

                                                    @if(isset($quest->OptionsThree) )
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="answer"
                                                                       id="invalidCheck " value="3" required>
                                                                <input type="hidden" name="question_id" value="{{ $quest->id }}"/>
                                                                <label class="form-check-label" for="invalidCheck">
                                                                    {{$quest->OptionsThree }}
                                                                </label>
                                                                <div class="invalid-feedback">
                                                                    يجب عليك اختيار احد الآمرين ! !
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    {{-- ###########  Radio Option Button value="0" الاختيار الثالث ############--}}

                                                    {{--submit button Start--}}

                                                    <form  action="{{route('answer.store')}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-primary btn-sm" type="submit"> صوت</button>
                                                    </form>

                                                    {{--<form action="{{route('vote.store'}}" method="POST">--}}
                                                    {{--    {{ csrf_field() }}--}}
                                                    {{--    <input type="hidden" name="question_id" value="{{$quest->id }}">--}}
                                                    {{--    <button class="btn btn-outline-primary btn-sm" type="submit"> صوت</button>--}}
                                                    {{--</form>--}}
                                                    {{--submit button End--}}

                                                    <br>
                                                    <br>
                                                    <br>
                                                    {{--End submit button--}}
{{--                                                @else--}}

                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input disabled class="form-check-input" type="radio" name="answer"
                                                                   id="invalidCheck" value="0" required>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                {{$quest->OptionsOne }}
                                                            </label>
                                                            <div class="invalid-feedback">
                                                                يجب عليك اختيار احد الآمرين ! !
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- ###########  Radio Option Button value="1" الاختيار الثاني ############--}}
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input disabled class="form-check-input" type="radio" name="answer"
                                                                   id="invalidCheck" value="1" required>
                                                            <label class="form-check-label" for="invalidCheck">
                                                                {{$quest->OptionsTwo }}
                                                            </label>
                                                            <div class="invalid-feedback">
                                                                يجب عليك اختيار احد الآمرين ! !
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- ###########  Radio Option Button value="0" الاختيار الثالث ############--}}

                                                    {{-- ###########  Radio Option Button value="0" الاختيار الثالث ############--}}
                                                    <small style="color: #d8174c">
                                                        <i class="fas fa-exclamation-circle" style="color: #d8174c"></i> تم الانتهاء
                                                        من التصويت</small>
                                                    {{-- ###########  Radio Option Button value="1"  End ############--}}

{{--                                                @endif--}}

                                            </div>

                                        </form>
                                    </div>
                                </div>


                        @endforeach
                        <br>
                        {{--   // radio Checkbox--}}
                        <script>
                            // radio Checkbox
                            (function () {
                                'use strict';
                                window.addEventListener('load', function () {
// Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function (form) {
                                        form.addEventListener('submit', function (event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>
                        {{--  // radio Checkbox End--}}
                        <br>


                        <script>
                            setTimeout(function () {
                                $('#message').fadeOut('fast');
                            }, 3000);
                        </script>
                    </div>
                    <div class="card-footer text-center">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>تنبيه!</strong> الموقع غير مسؤل عن نتائج التصويت .
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <p class="text-light text-center"> نهاية النتائج</p>
                    </div>



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
