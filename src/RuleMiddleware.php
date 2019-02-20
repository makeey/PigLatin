<?php

namespace PigLatin;

interface RuleMiddleware
{
    public function canProcess(string $word): bool;

    public function process(string $word): string ;
}