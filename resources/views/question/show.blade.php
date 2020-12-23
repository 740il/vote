@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">



                {{-- ########### Start Progress First ############--}}
                <div class="d-flex justify-content-between">
                    <small class="orders"></small>
                    <small class="orders  text-danger pb-1" style="font-size:xx-small">{{$total_0}}% نسبة
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

            <br>


                        <div class="text-right" dir="rtl">


                            <div class="card-header border text-right">
                                <p class="text-primary"> السؤال : {{$questionn->question}}</p>


                            </div>

                            @if(!Auth::user()->vote  ||  !Auth::id() == $questionn->user->id )
                                {{--                                        @if(Auth::id() == $post->user_id )--}}
                                {{-- ###########  Radio Option Button value="0" الاختيار الاول ############--}}
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer"
                                               id="invalidCheck " value="0" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            {{$questionn->OptionsOne }}
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
                                        <label class="form-check-label" for="invalidCheck">
                                            {{$questionn->OptionsTwo }}

                                        </label>
                                        <div class="invalid-feedback">
                                            يجب عليك اختيار احد الآمرين ! !
                                        </div>
                                    </div>
                                </div>

                                {{-- ###########  Radio Option Button value="0" الاختيار الثالث ############--}}

                                @if(isset($questionn->OptionsThree) )
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer"
                                                   id="invalidCheck " value="3" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                {{$questionn->OptionsThree }}
                                            </label>
                                            <div class="invalid-feedback">
                                                يجب عليك اختيار احد الآمرين ! !
                                            </div>
                                        </div>
                                    </div>

                                @endif





                                {{-- ###########  Radio Option Button value="0" الاختيار الثالث ############--}}





                                {{--submit button--}}
                                <form action="{{route('answer.store')}}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="question_id" value="{{$questionn->id }}">
                                    <input type="hidden" name="user_id" value="{{$questionn->id }}">
                                    <button class="btn btn-outline-primary btn-sm" type="submit"> صوت</button>
                                </form>
                                <br>
                                <br>
                                <br>


                                {{--End submit button--}}

                            @else


                                <div class="form-group">
                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="radio" name="answer"
                                               id="invalidCheck" value="0" required>
                                        <label class="form-check-label" for="invalidCheck">
                                            {{$questionn->OptionsOne }}
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
                                            {{$questionn->OptionsTwo }}
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
                                <hr>
                            @endif

                        </div>




                    <br>
                    {{--                            // radio Checkbox--}}
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
                    {{--                            // radio Checkbox End--}}
                    <br>

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
