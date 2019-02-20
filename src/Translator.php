<?php


namespace PigLatin;

class Translator
{

    /** @var RuleMiddleware[] */
    private $middleware;

    public function __construct()
    {
        $this->middleware[] = new WordStartedVowel();
        $this->middleware[] = new WordStartedConsonantLetter();
        $this->middleware[] = new WordStartedConsonantClusters();
    }

    private function translateWord(string $string)
    {
        foreach ($this->middleware as $middleware) {
            if ($middleware->canProcess($string)) {
                return $middleware->process($string);
            }
        }
    }

    public function translate(string $test)
    {
        return implode(" ", array_map(function ($word) {
            return $this->translateWord($word);
        }, explode(" ", $test)));

    }
}