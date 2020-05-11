<?php

    $string = "aku juga manusia !!!";

    //count string lenght
    echo strlen($string);

    print '<br>';

    //count words in string
    echo str_word_count($string);

    print('<br>');

    //reverse string
    echo strrev($string);

    echo'<br>';

    //search the word in string
    echo strpos($string,'manusia');

    echo('<br>');

    //replace word in string
    echo str_replace('manusia','bebek',$string);