<?php
include "./Parsedown.php";
include "./Question.php";
include "./QuestionList.php";

$QList = new QuestionList();

$QList->parse("question.md");
// $QList->all();

$question = $QList->fuzzySearch("Ouput là gì");
if($question != false) {
    $question->showQuestion();
}
else {
    echo "Không tìm thấy :D";
}

