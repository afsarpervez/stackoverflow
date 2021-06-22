<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;

class VoteAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        $vote = (int) request() -> vote;

        $c = auth() -> user() -> voteAnswer($answer, $vote);

        return response()->json([
            'message' => 'Thanks for the feedback',
            'votesCount' => $c
        ]);

    }

}
