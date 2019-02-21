<?php


namespace PigLatin;

class Translator
{

    /** @var RuleMiddleware[] */
    private $middleware;

    public function __construct()
    {
        $this->middleware[] = new WordStartedVowel();
        $this->middleware[] = new WordStartedConsonant();
    }

    private function translateWord(string $string)
    {
        foreach ($this->middleware as $middleware) {
            $string = $middleware->process($string);
        }
        return $string;
    }

    public function translate(string $test)
    {
        return implode(" ", array_map(function ($word) {
            return $this->translateWord($word);
        }, explode(" ", $test)));

    }
}