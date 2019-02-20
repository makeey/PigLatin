<?php

namespace PigLatin\Spec;


use PigLatin\Translator;


describe('Translator', function () {
    given('translator', function () {
        return new Translator();
    });


    describe("For words that begin with consonant sounds, all letters before the initial vowel are placed 
    at the end of the word sequence. Then, \"ay\" is added, as in the following examples:", function () {
        it("translate", function () {

            expect(
                $this->translator->translate('Enter the english text here that you want translated into pig latin')
            )->toBe(
                'Enteray ethay englishay exttay erehay atthay youay  anslatedtray intoay igpay atinlay'
            );

        });
    });

});