<?php

namespace Infra;

use Domain\IPoetryLibrary;

class FileSystemPoetryLibrary implements IPoetryLibrary {
  public function getAPoem() {
    $poem = file_get_contents("./assets/poem.txt");
    $poem = mb_convert_encoding($poem, "UTF-8", "ISO-8859-1");
    return $poem;
  }
}

// Left-side adapter => to expose the app
class CLI {
  function __construct($poetryReader) {
    $this->poetryReader = $poetryReader;
  }

  public function askPoetry() {
    echo $this->poetryReader->giveMeSomePoetry();
  }
}