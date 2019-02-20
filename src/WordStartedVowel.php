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
        if (!$this->canProcess($word)) throw new \RuntimeException(sprintf('Middleware `%s` can not process word: %s', self::class, $word));

        return $word . self::POSTFIX;
    }
}