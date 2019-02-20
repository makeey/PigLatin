<?php


namespace PigLatin\Spec;


use PigLatin\WordStartedConsonantClusters;

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
    ];

    public const WRONG_WORDS = [
        'foo' => 'baz',
        'east' => 'west',
    ];
}

describe('WordStartedConsonantClusters', function () {
    given('middleware', function () {
        return new WordStartedConsonantClusters();
    });

    describe("When words begin with consonant clusters (multiple consonants that form one sound),
     the whole sound is added to the end when speaking or writing.", function () {
        it("middleware", function () {
            foreach (WordStartedConsonantClustersTestCase::consonant_clusters as $test_case) {
                expect($this->middleware->process($test_case[0]))->toBe($test_case[1]);
            }
        });
        it("fail with wrong words", function () {
            foreach (WordStartedConsonantClustersTestCase::WRONG_WORDS as $word) {
                $closure = function () use ($word) {
                    $this->middleware->process($word[0]);
                };
                expect($closure)->toThrow(new \RuntimeException());
            }
        });
    });
});