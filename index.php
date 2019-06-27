<?php
include "./Parsedown.php";
include "./Question.php";
include "./QuestionList.php";

$QList = new QuestionList();

$QList->parse("question.md");
$QList->all();

//$QList->fuzzySearch("Chameleon");

