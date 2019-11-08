<?php

// Run with `php 03.03.php`

// TODO: Get a poem from a poetry library, or return a default one

class PoetryReader {
  public function giveMeSomePoetry() {
    $poem = file_get_contents("./assets/poem.txt");
    $poem = mb_convert_encoding($poem, "UTF-8", "ISO-8859-1");

    if (!$poem) {
      $poem = "If you could read a leaf or tree\r\nyou’d have no need of books.\r\n-- © Alistair Cockburn (1987)";
    }

    return $poem;
  }
}

$poetryReader = new PoetryReader();
echo $poetryReader->giveMeSomePoetry();