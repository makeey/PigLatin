<?php

use PigLatin\WordStartedVowel;


class Constant
{
    const VOWELS_WORD = [
        ['eat', 'eatay'],
        ['omelet', 'omeletay'],
        ['are', 'areay'],
        ['egg', 'eggay'],
        ['explain', 'explainay'],
        ['always', 'alwaysay'],
        ['ends', 'endsay'],
        ['I', 'Iay'],
    ];

    const WRONG_WORDS = [
        ['foo', 'bar'],
        ['baz', 'bar'],
    ];
}


describe('WordStartedVowel', function () {
    given('middleware', function () {
        return new WordStartedVowel();
    });

    describe("For words that begin with vowel sounds, one just adds \"way\" or \"yay\" to the end (or just \"ay\"). ", function () {
        it("middleware", function () {
            foreach (Constant::VOWELS_WORD as $test_case) {
                expect($this->middleware->process($test_case[0]))->toBe($test_case[1]);
            }
        });
        it("fail with wrong words" ,function(){
            foreach (Constant::WRONG_WORDS as $word) {
                $closure = function () use ($word) {
                    $this->middleware->process($word[0]);
                };
                expect($closure)->toThrow(new \RuntimeException());
            }
        });
    });

});