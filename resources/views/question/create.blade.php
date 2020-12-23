@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card text-white bg-primary mb-3">{{ __('  Add - Question') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <h3 class="text-right">اضافة تصويت مفرد</h3>


                        <form action="{{ route('question.store') }}" method="post" dir="rtl">

                            {{ csrf_field() }}

                            <div class="form-group text-right">
                                <label for="experiencesla"> سؤال التصويت :</label>
                                <input type="text"
                                       class="form-control {{ $errors->has('question') ? ' is-invalid' : '' }}  "
                                       id="experiencesla" name="question" placeholder="سؤال  التصويت ">
                                @if ($errors->has('question'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group text-right">
                                <label for="title"> اجابات التصويت :</label>
                                <input type="text" autofocus placeholder="  نعم  "
                                       class="form-control {{ $errors->has('OptionsOne') ? ' is-invalid' : '' }} "
                                       name="OptionsOne">

                                @if ($errors->has('OptionsOne"'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('OptionsOne"') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group text-right">
                                <label for="title"> اجابات التصويت :</label>
                                <input type="text" autofocus placeholder="  لا  "
                                       class="form-control {{ $errors->has('OptionsTwo') ? ' is-invalid' : '' }} "
                                       name="OptionsTwo">
                                @if ($errors->has('optionsTwo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('OptionsTwo') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <hr>
                            <div class="form-group text-right">
                                <label for="title"> اختياري :</label>
                                <input type="text"  placeholder="  اختياري  "
                                       class="form-control {{ $errors->has('OptionsThree') ? ' is-invalid' : '' }} "
                                       name="OptionsThree">
                                @if ($errors->has('optionsThree'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('OptionsThree') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <hr>
                            <div class="form-group text-right">
                                <label for="title"> ملاحظات :</label>
                                <input type="text"  placeholder="  كتابة ملاحظات  "
                                       class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }} "
                                       name="note">
                                @if ($errors->has('note'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group ">
                                <button id="btt" type="submit" name="send"
                                        class="btn btn-primary float-right">ارسل التصويت
                                </button>
                            </div>





                            {{--       ######## bootstrap loading spinner on button ############--}}
                            <script>
                                $(document).ready(function() {
                                    $('#btt').on('click', function() {
                                        var $this = $(this);
                                        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
                                        if ($(this).html() !== loadingText) {
                                            $this.data('original-text', $(this).html());
                                            $this.html(loadingText);
                                        }
                                        setTimeout(function() {
                                            $this.html($this.data('original-text'));
                                        }, 2000);
                                    });
                                })
                            </script>
                            {{--                            ######## bootstrap loading spinner on button  End############--}}

                        </form>
                    </div>
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
