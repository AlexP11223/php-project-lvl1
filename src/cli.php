<?php

namespace Braingames\cli;

function run($game)
{
    \Braingames\engine\run($game);
}

function runEven()
{
    run(\BrainGames\games\even\make());
}

function runCalc()
{
    run(\BrainGames\games\calc\make());
}

function runGcd()
{
    run(\BrainGames\games\gcd\make());
}

function runProgression()
{
    run(\BrainGames\games\progression\make());
}

function runPrime()
{
    run(\BrainGames\games\prime\make());
}
