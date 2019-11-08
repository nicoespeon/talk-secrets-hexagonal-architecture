<?php

class PoetryReader {
  public function giveMeSomePoetry() {
    $poem = readEncodedFile($filename);

    if (!$poem) {
      $poem = "If you could read a leaf or tree\r\nyou’d have no need of books.\r\n-- © Alistair Cockburn (1987)";
    }

    return $poem;
  }
}

// Extracting the code in a function is great.
// But it doesn't change Domain depends on the FileSystem.

function readEncodedFile($filename) {
  $poem = file_get_contents($filename);
  $poem = mb_convert_encoding($poem, "UTF-8", "ISO-8859-1");
  return $poem;
}

$poetryReader = new PoetryReader();
echo $poetryReader->giveMeSomePoetry();
