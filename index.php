<?php
include 'vendor/autoload.php';
include "./Question.php";
include "./QuestionList.php";

$faker = Faker\Factory::create();
echo '<h1>' . $faker->text(100) . '</h1>';
echo '- Name: ' . $faker->name . '<br>';
echo '- Address: ' . $faker->address . '<br>';
echo '- Email: ' . $faker->email . '<br>';
echo '- Phone number: ' . $faker->tollFreePhoneNumber . '<br>';
echo '<br><br>';
echo $faker->realText(400);

$QList = new QuestionList();

$QList->parse("question.md");

$Parsedown = new Parsedown();
echo $Parsedown->text($QList->all());

// $question = $QList->fuzzySearch("sessionStorage");
// if($question != false) {
//     echo $Parsedown->text($question);
// }
// else {
//     echo "Không tìm thấy :D";
// }

