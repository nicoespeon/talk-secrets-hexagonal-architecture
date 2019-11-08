<?php

namespace Domain;

class PoetryReader {
  function __construct($poetryLibrary) {
    $this->poetryLibrary = $poetryLibrary;
  }

  public function giveMeSomePoetry() {
    $poem = $this->poetryLibrary->getAPoem();

    if (!$poem) {
      $poem = "If you could read a leaf or tree\r\nyou’d have no need of books.\r\n-- © Alistair Cockburn (1987)";
    }

    return $poem;
  }
}

interface IPoetryLibrary {
  public function getAPoem();
}