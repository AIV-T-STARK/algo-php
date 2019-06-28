<?php

class QuestionList
{
    private $questionList = [];

    public function fuzzySearch($input)
    {

        foreach ($this->questionList as $question) {
            if ($input != '' && strpos($question->questionContent, $input)) {
                return $question;
            }
        }
        return false;

        // $similar = 0;
        // $output = null;

        // foreach ($this->questionList as $question) {
        //     similar_text($question, $input, $perc);
        //     echo $perc;
        //     if($perc > $similar) {
        //         $similar = $perc;
        //         $output = $question;
        //     }
        // }
        // return $output === null || $similar === 0 ? "Không tìm thấy" : $output ;
    }

    public function parse($path)
    {
        $file = fopen($path, "r") or die("Unable to open file!");
        $count = 1;
        while(!feof($file)) {
            $question  = new Question("", "");

            $line = fgets($file);
            if(preg_match("/###### [0-9]*\./", $line, $matches)) {

                $line =  "### Đây là câu $count: " . str_replace($matches, "", $line);

                while (!feof($file)) {
                    if(!preg_match("/<details>/", $line)) {
                        $question->questionContent .= $line;
                        $line = fgets($file);
                    }
                    else {

                        $count++;

                        while (!feof($file)) {
                            $question->answer .= $line;
                            $line = fgets($file);

                            if(preg_match("/---/", $line)) {
                                break;
                            }
                        }
                    }

                    if(preg_match("/---/", $line)) {
                        break;
                    }
                }

                $this->questionList[] = $question;
            }
        }

        fclose($file);
    }

    public function all()
    {
        foreach ($this->questionList as $question) {
            $question->showQuestion();
        }
    }

    

}