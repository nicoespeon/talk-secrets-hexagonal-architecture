<?php

// Run with `./scripts/phpunit --testdox 05.02.04-tests.php`

include "05.02.01-domain.php";

use PHPUnit\Framework\TestCase;

class PoetryReaderTest extends TestCase {
  public function testGiveSomePoetryFromLibrary() {
    // Given
    $poem = "I want to sleep…\r\n-- Masaoka Shiki (1867-1902)";

    $poetryLibrary = $this->createMock(Domain\IPoetryLibrary::class);
    $poetryLibrary->method("getAPoem")->willReturn($poem);

    $poetryReader = new Domain\PoetryReader($poetryLibrary);

    // When
    $result = $poetryReader->giveMeSomePoetry();

    // Then
    $this->assertEquals($poem, $result);
  }

  public function testGiveDefaultIfThereIsNoPoem() {
    // Given
    $poetryLibrary = $this->createMock(Domain\IPoetryLibrary::class);
    $poetryLibrary->method("getAPoem")->willReturn("");

    $poetryReader = new Domain\PoetryReader($poetryLibrary);

    // When
    $result = $poetryReader->giveMeSomePoetry();

    // Then
    $this->assertEquals("If you could read a leaf or tree\r\nyou’d have no need of books.\r\n-- © Alistair Cockburn (1987)", $result);
  }
}