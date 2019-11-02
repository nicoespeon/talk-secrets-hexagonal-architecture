<?php

include "05.02.01-domain.php";
include "05.02.02-infra.php";

// 1. Instantiate the right-side adapters
$fsPoetryLibrary = new Infra\FileSystemPoetryLibrary();

// 2. Instantiate the hexagon
$poetryReader = new Domain\PoetryReader($fsPoetryLibrary);

// 3. Instantiate the left-side adapters
$cli = new Infra\CLI($poetryReader);

// App logic, using left-side adapters
echo "Here is some poetry:\n\n";
$cli->askPoetry();
