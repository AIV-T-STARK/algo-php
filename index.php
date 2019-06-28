<?php
include "./Parsedown.php";
include "./Question.php";
include "./QuestionList.php";

$QList = new QuestionList();

$QList->parse("question.md");

$Parsedown = new Parsedown();
echo $Parsedown->text($QList->all());

$question = $QList->fuzzySearch("sessionStorage");
if($question != false) {
    echo $Parsedown->text($question);
}
else {
    echo "Không tìm thấy :D";
}

