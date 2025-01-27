<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hangmanController extends Controller
{
    public function index(){
        $letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $words = ["LIBRARY", "MUSICIAN", "TELEVISION", "BOOKCASE", "SKIRT", "COMMUNICATION", "SMARTPHONE", "BELLY", "SUCKER", "LIEUTENANT", "JEWELLERY"];
        
        
        $lettersGuessed=session("letters",[]);
        $word = session('word');
        $lettersGuessed = session('letters',[]);
        $foundWord = $this->checkIfWordIsGuessed($word, $lettersGuessed);
        $wordArray=session("wordArray");
        if (!session()->has('tries')) {
            session(['tries' => 7]);
        }

        $randIndex = array_rand($words);
        if(session("tries")==-1||empty(session("letters"))||$foundWord==true){
        session(['word' => $words[$randIndex]]);
        session(['letters' => []]);
        session(['tries' => 7]);
    }

        return view('hangman', [
            'letters' => $letters,
            'storeletters' => $lettersGuessed,
            'word' => session('word'),
            'tries' => session('tries'),
            'foundword' => $foundWord,
            "wordarray"=>$wordArray
        ]);
    }



public function handleLetter(Request $request){
        
        $letters = $request->input("letter");
        $lettersGuesed=session("letters",[]);
        if(!in_array($letters,$lettersGuesed)){
            $lettersGuesed[]=$letters; }
        session(["letters" => $lettersGuesed]);


        if (strpos(session("word"), $letters) === false) {  
            $tries = session("tries"); 
            session(["tries" => $tries - 1]);
        
    }
    
    
    return redirect()->route('index.hangman');
   }

   private function checkIfWordIsGuessed($word, $guessedLetters)
    {
    
        $wordArray = str_split($word);
        session(["wordArray"=>$wordArray]);
        
        
        foreach ($wordArray as $letter) {
            if (!in_array($letter, $guessedLetters)) {
                return false; 
            }
        }
        
        return true;
    }
    public function newGame(){
        session(["letters"=>[]]);
        return redirect()->route("index.hangman");
    }
     
 }

