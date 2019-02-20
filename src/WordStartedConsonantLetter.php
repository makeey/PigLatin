<?php

namespace PigLatin;


class WordStartedConsonantLetter implements RuleMiddleware
{

    private const POSTFIX = 'ay';

    public function canProcess(string $word): bool
    {
        return in_array(strtoupper($word[0]),LettersConstant::CONSONANT,true) && !in_array(strtoupper($word[1]),LettersConstant::CONSONANT,true);
    }

    public function process(string $word): string
    {
        if (!$this->canProcess($word)) throw new \RuntimeException(sprintf('Middleware `%s` can not process word: %s', self::class, $word));
        return substr($word, 1, strlen($word)). $word[0] . self::POSTFIX;
    }
}