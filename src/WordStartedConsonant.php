<?php


namespace PigLatin;


class WordStartedConsonant implements RuleMiddleware
{
    private const POSTFIX = 'ay';


    public function canProcess(string $word): bool
    {
        return in_array(strtoupper($word[0]), LettersConstant::CONSONANT, true);
    }

    public function process(string $word): string
    {
        return $this->canProcess($word) ?
            substr($word, $this->firstVowelIndex($word), strlen($word)) . substr($word, 0, $this->firstVowelIndex($word)) . self::POSTFIX :
            $word;

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