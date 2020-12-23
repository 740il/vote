<?php

namespace App\Http\Controllers;

use App\Answer;

use App\Question;
use App\User;
use App\Vote;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\Promise\all;

class AnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

                $question = Question::all();
                $answer = Answer::all();
                $aa = Answer::all()->count();
                     $vv= Vote::all()->count() ;

//        $voted = $question->answers()->whereUserId(Auth::id())->first();
//                return  $answer ;
//
//       $nnnn= DB::table('answers')->whereUserId(Auth::id())->get();
//                        return  $nnnn ;

        $votes = Answer::where('answer',1)->count();

        $votes2 = Answer::where('answer',0)->count();

        $tootalbln = DB::table('answers')->where('answer',0)->count();
        $tootalbln1 = DB::table('answers')->where('answer',1)->count();
//        return  $tootalbln1;
        $anss = Answer::whereAnswer(1)->get()->groupBy('user_id');

//            return  $ans1 ;

                $question = Question::orderBy('id', 'DESC')->with('answers','user')->get();
                $vot = User::orderBy('id', 'DESC')->with('answers')->get();
//        return    $question;

        $postt  =  Auth::user()->answers()->orderBy('created_at', 'desc')->count();

//        return  $postt ;


                $id = Auth::id();

//        $qus = Question::with('answers')->where('user_id', $id)->get();
//        Question::find($questionId)->answer()->get();

//        $question =  Question::with('answers')->where('user_id',$id)->get();


        $user = Auth::user();
//        $questionnn = User::orderBy('id', 'DESC')->with('answers')->count();

//        $questionnn = $user->answers()->with('questions')->get();
//        return   $questionnn;



//        $question =  Question::orderBy('id', 'DESC')->get();
//        $answer =  Answer::orderBy('id', 'DESC')->get();
//                return  $answer ;
//        $question =  Question::with('answers')->get();

//        $question->questionss()->first();

//        $answ = User::with('answerss')->get();
        $vo = User::with('vote')->get();
        $answ = User::with('questions','vote')->get();

        $ans_qus = Question::with('answers') ->get();
//        return  $ans_qus ;


        $post  =  Auth::user()->vote()->orderBy('created_at', 'desc')->paginate();

        $id = Auth::id();
        $qus = collect(Question::with('answers')->where('user_id', $id)->get());
//        return  $qus ;
        $user = Auth::user();

        $qa2 = Question::with('answers')->where('user_id', $id)->get();

//        return  $qa2 ;
//        $question =  Question::orderBy('id', 'DESC')->get();
//        $question = Question::orderBy('id', 'DESC')->with('answers')->get();

//        $test = User::with('answers','questions')->get();
//                 return $test;                                                         $answer[$qus->id]


//        $answer = Answer::orderBy('id', 'DESC')->with('question_id')->get();



        $q = $user->questions;
//
//        return $answer;
        foreach ($q as $qus){

            $answer[$qus->id] = $qus->answers;

        }


        foreach ($answer as $ans){
            $total[$ans->question_id] = $ans->count();


        }










        if($total != 0)
        {

            $total_0 = round($vo->where('answer',0)->count()*100/$total);
            $total_1 = round($vo->where('answer',1)->count()*100/$total );  // 2

        }
        else {
            $total_0 = 0;
            $total_1   = 0;
        }



        $total_0numper = $vo->where('answer',0)->count();   //1
        $total_1numper = $vo->where('answer',1)->count();  // 2

//        $qus = collect(Answer::with('questions')->where('question_id', $id)->count());
//        $qus = (Question::with('answer')->where('answer',1)->count());

//        return     $qus ;

//        {{round(($poll_answer['votes']/$total_votes)*100)}}
//
//        $vo = User::with(['answers'=>function ($q)
//        {
//        $q ->select('ansone' ,'user_id');
//
//        }])->get();
//
//        return  $vo;



//
//        $vo = User::whereHas('answer', function($q)
//        {
//            $q->where('answer');
//        })->get();
//
//        return  $vo;

//        $vo = User::with('answers')->get();
//        $vo = User::with('questionss')->get();

//        $user = Auth::user();
//      $question =  Answer::orderBy('id', 'DESC')->get();
//      $question =  Question::orderBy('id', 'DESC')->get();

//        $q =  User::all();


//      $vo = Question::with('answers')->get();

//                return $vo ;


//       $user->answers->ansone ;
//       $user->question->question ;
//        foreach ( $vo as $v)
//             $v->user;
//        return $v ;

//        return $user ;


//        foreach ($product as $p) {
//           $p->pan;
//        }
//        return $product ;



//        return  $ttt;
//        dd  ($ttt);

        return $q;

        return view('answer.index ' , [
            'questionr' => $q,
            'total' => $total,
            'total_0' =>$total_0,
            'total_1'=>$total_1,
            'user'=>$user,
           'total_0numper'=>$total_0numper,
            'total_1numper'=>$total_1numper,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function store( Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required',
        ],
            [
                'answer.required' => 'اجابات التصويت ',
                'question_id.required' => 'اجابات التصويت ',
            ]);

//       return Question::findOrFail($request->question_id);

        $ans = Question::findOrFail($request->question_id);

        $user = Auth::User();
        Answer::create([
            'answer' => $request->answer,
            'user_id' => $user->id,
            'question_id' => $ans->id ,
        ]);


//
//        $vote = new Answer();
//        $vote ->answer = $request->input('answer');
//        $vote-> question_id = $request->input('question_id');
//        $vote->user()->associate($user);
//        $vote -> save();

//        $ans = new Answer();
//        $ans->answer = $request->answer;
//        $ans->user()->associate($request->user());
//        $qus = Question::find($request->question_id);
//        $qus->answers()->save($ans);
//        return back();

//        $input = $request->all();
//        $input['user_id'] = auth()->user()->id;
//
//        Answer::create($input);

//        $user = Auth::User();
//        $ans = new Answer();
//        $ans-> answer = $request->get('answer');
//        $ans-> question_id = $request->get('question_id');
//        $ans-> user_id = $user-> id;
//        $ans-> save();

//        $q =   Question::first();
//        $a =   Answer::first();
//        $a->answers()->attach($q->id);

        Session::flash('message', 'تم الانتهاء من التصويت !');
        return redirect()->back();
//        return redirect()->route('answer.index');
    }

    public function vote(Request $request)  {
//        $user = Auth::User();


        $question = Answer::where('id', $request -> answer) -> first();

//        $vote = new Vote();
//        $vote -> question_id = $question -> id;
//        $vote -> user_id = $user-> id;
//
//        $vote -> save();
        $vote = new Vote;
        $vote->user_id = Auth::id();
        $vote->question_id = $question;
        $vote->Save();

        return redirect()->route('answer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ans = Question::findOrFail($id) ;
        return view('answer.index', compact('ans'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user_id = Auth::id();
//        $delete = Answer::find($id);
//        $delete = DB::table('answers')->where(`answers`.`1`);
        Answer::where('user_id', $user_id)->delete();
//        $delete->delete();
//                        $d =   DELETE FROM `answers` WHERE `answers`.`id` = 2


        return redirect()->route('answer.index');
    }


    public function vdeleteote($id) {


        Answer::where('answers', 'answers',$id)->delete();

        return redirect()->back();
    }

}

