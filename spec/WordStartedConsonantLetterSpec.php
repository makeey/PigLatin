<?php

use PigLatin\WordStartedConsonantLetter;

class WordStartedConsonantLetterTestCase
{
    const CONSONANT_WORD = [
        ['pig', 'igpay'],
        ['latin', 'atinlay'],
        ['banana', 'ananabay'],
        ['happy', 'appyhay'],
        ['duck', 'uckday'],
        ['me', 'emay'],
        ['too', 'ootay'],
    ];

    const WRONG_WORDS = [
        ['ooo', 'bar'],
        ['smth', 'bar'],
    ];

}

describe('WordStartedConsonantLetter', function () {
    given('middleware', function () {
        return new WordStartedConsonantLetter();
    });

    describe("For words that begin with consonant sounds, all letters before the initial vowel
     are placed at the end of the word sequence. Then, \"ay\" is added, as in the following examples", function () {
        it("middleware", function () {
            foreach (WordStartedConsonantLetterTestCase::CONSONANT_WORD as $test_case) {
                expect($this->middleware->process($test_case[0]))->toBe($test_case[1]);
            }
        });
        it("fail with wrong words", function () {
            foreach (WordStartedConsonantLetterTestCase::WRONG_WORDS as $word) {
                $closure = function () use ($word) {
                    $this->middleware->process($word[0]);
                };
                expect($closure)->toThrow(new \RuntimeException());
            }
        });
    });

});