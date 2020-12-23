<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Note;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();



        if ($user->question) {
            return redirect()->route('answer.index');
        }


        $question=  Question::orderBy('id', 'DESC')->get();


      return view('question.index',compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $user = Auth::user();
        $question=  Question::orderBy('id', 'DESC')->get();
        return view('question.create',compact('question'));
    }


    public function store(Request $request)
    {

        $user = Auth::user();

        if ($user->question) {
            return redirect()->route('answer.index');
        }

        $request->validate([

            'question' => 'required',
            'OptionsOne' => 'required',
            'OptionsTwo' => 'required',
            'OptionsThree' => 'nullable',
            'note' => 'nullable',

        ],
            [
                'question.required' => 'ادخل سؤال التصويت',
                'OptionsOne.required' => 'اجابات التصويت ',
                'OptionsTwo.required' => 'اجابات التصويت ',
                'OptionsThree.nullable' => ' هذا الحثل اختياري ',
                'note.nullable' => ' هذا الحثل اختياري ',

            ]);


        $user = Auth::User();
//        $user_id = Auth::id();
        $que = new Question();

        $que->question = $request['question'];
        $que->OptionsOne = $request['OptionsOne'];
        $que->OptionsTwo = $request['OptionsTwo'];
        $que->OptionsThree = $request['OptionsThree'];
        $que->note = $request['note'];
        $que->user_id = $user->id;
        $que-> save();






//        $q =   Question::first();
//        $a =   Answer::first();
////
////
//        $q->questions()->attach($a->id);




//        return view('answer.index');
        return redirect()->route('answer.index');


//        return back()->with('success', 'Todos Has Been Created Successfully.');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



//        $voted = $question->votes()->whereUserId(Auth::id())->first();


        $total = Answer::count();
        if($total != 0)
        {
            $total_0 = round(DB::table('answers')->where('answer',0)->count()*100/$total);// 0
            $total_1 = round(DB::table('answers')->where('answer',1)->count()*100/$total );  // 1
        }
        else {
            $total_0 = 0;
            $total_1   = 0;
        }
        $total_0numper = DB::table('answers')->where('answer',0)->count();   //0
        $total_1numper = DB::table('answers')->where('answer',1)->count();  // 1


        $questionn  = Question::findOrFail($id)->first();
        return view('question.show',compact('question','questionn','note','total','total_0','total_1','total_0numper','total_1numper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Question::find($id);
        $delete->delete();

    }
}
