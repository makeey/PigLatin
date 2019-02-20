<?php


namespace PigLatin;


class WordStartedConsonantClusters implements RuleMiddleware
{
    private const POSTFIX = 'ay';


    public function canProcess(string $word): bool
    {
        if (strlen($word) < 2) return false;
        return in_array(strtoupper($word[0]), LettersConstant::CONSONANT, true) && in_array(strtoupper($word[1]), LettersConstant::CONSONANT, true);
    }

    public function process(string $word): string
    {
        if (!$this->canProcess($word)) throw new \RuntimeException(sprintf('Middleware `%s` can not process word: %s', self::class, $word));
        return substr($word, $this->firstVowelIndex($word), strlen($word)) . substr($word, 0, $this->firstVowelIndex($word)) . self::POSTFIX;
    }

    private function firstVowelIndex(string $word)
    {
        for ($i = 0; $i < strlen($word); $i++) {
            if ($this->isVowel($word[$i])) {
                return $i;
            }
        }
        return -1;
    }

    private function isVowel(string $char)
    {
        return in_array(strtoupper($char), LettersConstant::VOWEL, true);
    }
}