<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    public function __construct() {
        $this->middleware('auth');


    }

    public function __invoke(Answer $answer) {
        $vote = (int) \request()->vote;

        $votesCount = auth()->user()->voteAnswer($answer, $vote);


        if (request()->expectsJson()) {
            return response()->json([
                'message' => 'Thank you for your feedback!',
                'votesCount' => $votesCount
            ]);
        }

        return back();
    }
}
