/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\HHAST;


final class LicenseHeaderLinterTest extends TestCase {
  use AutoFixingLinterTestTrait<Linters\ASTLintError>;

  protected function getLinter(
    string $file,
  ): Linters\LicenseHeaderLinter {
    Linters\LicenseHeaderLinter::__setExpectedHeaderForTesting(
      \file_get_contents(__DIR__.'/../.LICENSE_HEADER.hh.txt')
    );
    return Linters\LicenseHeaderLinter::fromPath($file);
  }

  public function getCleanExamples(): array<array<string>> {
    $header = \file_get_contents(__DIR__.'/../.LICENSE_HEADER.hh.txt');
    return [
      // .php, hh
      ["<?hh\n".$header],
      ["<?hh // strict\n".$header],
      ["<?hh // partial\n".$header],
      ["<?php\n".$header],
      ["<?php\n".$header."\nfoo();\n"],
      // .hack
      [$header],
      [
        $header.
        "\n".
        "use namespace HH\Lib\Str;\n".
        "<<__EntryPoint>>\n".
        "function main(): noreturn { exit (0); }\n"
      ],
    ];
  }
}
