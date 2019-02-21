<?php


namespace PigLatin;


final class WordStartedVowel implements RuleMiddleware
{

    private const POSTFIX = 'ay';

    public function canProcess(string $word): bool
    {
        return in_array(strtoupper($word[0]), LettersConstant::VOWEL, true);
    }

    public function process(string $word): string
    {
        return $this->canProcess($word) ? $word . self::POSTFIX : $word;
    }
}