<?php


namespace PigLatin\Spec;


use PigLatin\WordStartedConsonant;

class WordStartedConsonantClustersTestCase
{


    public const consonant_clusters = [
        ['smile', 'ilesmay'],
        ['string', 'ingstray'],
        ['stupid', 'upidstay'],
        ['glove', 'oveglay'],
        ['trash', 'ashtray'],
        ['floor', 'oorflay'],
        ['store', 'orestay'],
        ['want', 'antway'],
        ['pig', 'igpay'],
        ['latin', 'atinlay'],
        ['banana', 'ananabay'],
        ['happy', 'appyhay'],
        ['duck', 'uckday'],
        ['me', 'emay'],
        ['too', 'ootay'],
        ['eat', 'eat'],
        ['omelet', 'omelet'],
        ['are', 'are'],
        ['egg', 'egg'],
        ['explain', 'explain'],
        ['always', 'always'],
        ['ends', 'ends'],
        ['I', 'I'],
    ];
}

describe('WordStartedConsonant', function () {
    given('middleware', function () {
        return new WordStartedConsonant();
    });

    describe("When words begin with consonant clusters (multiple consonants that form one sound),
     the whole sound is added to the end when speaking or writing.", function () {
        it("middleware", function () {
            foreach (WordStartedConsonantClustersTestCase::consonant_clusters as $test_case) {
                expect($this->middleware->process($test_case[0]))->toBe($test_case[1]);
            }
        });
    });
});