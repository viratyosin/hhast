/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\HHAST\__Private;

use namespace Facebook\HHAST;
use namespace HH\Lib\{C, Str, Vec};
use type Facebook\HHAST\Migrations\{
  AddFixmesMigration,
  AssertToExpectMigration,
  BaseMigration,
  ExplicitPartialModeMigration,
  HSLMigration,
  IMigrationWithFileList,
  ImplicitShapeSubtypesMigration,
  IsRefinementMigration,
  LinterGenericsToTypeConstantsMigration,
  NamespaceFallbackMigration,
  OptionalShapeFieldsMigration,
  PHPUnitToHackTestMigration,
};

use type Facebook\CLILib\{CLIWithRequiredArguments, ExitException};
use namespace Facebook\CLILib\CLIOptions;

class MigrationCLI extends CLIWithRequiredArguments {
  use CLIWithVerbosityTrait;

  const VERBOSE_SKIP_BECAUSE_GIT = 2;
  const VERBOSE_SKIP_BECAUSE_NOT_HACK = 1;
  const VERBOSE_SKIP_BECAUSE_VENDOR = 1;
  const VERBOSE_MIGRATE = 2;
  const VERBOSE_MIGRATE_NOT_HACK = 1;

  protected keyset<classname<BaseMigration>> $migrations = keyset[];
  private bool $includeVendor = false;
  private bool $xhprof = false;

  <<__Override>>
  final public static function getHelpTextForRequiredArguments(): vec<string> {
    return vec['PATH'];
  }

  <<__Override>>
  protected function getSupportedOptions(): vec<CLIOptions\CLIOption> {
    $options = vec[
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = HSLMigration::class;
        },
        'Convert PHP standard library calls to HSL',
        '--hsl',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = AssertToExpectMigration::class;
        },
        'Change assert calls to expect ',
        '--assert-to-expect',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = ImplicitShapeSubtypesMigration::class;
        },
        'Allow implicit structural subtyping of all shapes',
        '--implicit-shape-subtypes',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = OptionalShapeFieldsMigration::class;
        },
        'Migrate nullable shape fields to be both nullable and optional',
        '--optional-shape-fields',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = OptionalShapeFieldsMigration::class;
          $this->migrations[] = ImplicitShapeSubtypesMigration::class;
        },
        'Apply all migrations for moving from 3.22 to 3.23',
        '--hhvm-3.22-to-3.23',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(
            1,
            "Use HHAST 4.8.* or below for this migration",
          );
        },
        'no longer supported',
        '--ctpbr',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(
            1,
            "Use HHAST 4.8.* or below for this migration",
          );
        },
        'Apply all migrations for moving from 3.23 to 3.24',
        '--hhvm-3.23-to-3.24',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(
            1,
            "Use HHAST 4.2.* or below for this migration",
          );
        },
        'no longer supported',
        '--hhvm-4.2-to-4.3',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(
            1,
            "Use HHAST 4.2.* or below for this migration",
          );
        },
        'no longer supported',
        '--ltgt-to-ne',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(
            1,
            "Use HHAST 4.2.* or below for this migration",
          );
        },
        'no longer supported',
        '--hhvm-3.28-to-3.29',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = IsRefinementMigration::class;
        },
        'Replace is_foo() with is expressions',
        '--is-refinement',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = IsRefinementMigration::class;
        },
        'Apply all migrations for moving from 3.29 to 3.30',
        '--hhvm-3.29-to-3.30',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = NamespaceFallbackMigration::class;
        },
        'Add leading \\ to calls to unqualified references to global '.
        'functions or constants',
        '--no-namespace-fallback',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = PHPUnitToHackTestMigration::class;
        },
        'Migrate from PHPUnit to HackTest',
        '--phpunit-to-hacktest',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = ExplicitPartialModeMigration::class;
        },
        "Add `// partial` to files that don't specify a mode",
        '--explicit-partial-mode',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = ExplicitPartialModeMigration::class;
          $this->migrations[] = NamespaceFallbackMigration::class;
        },
        'Apply all migrations for moving from 4.0 to 4.1',
        '--hhvm-4.0-to-4.1',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = LinterGenericsToTypeConstantsMigration::class;
        },
        'Migrate HHAST 4.5 linter to 4.6',
        '--hhast-4.5-linter-to-4.6',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(1, "Use HHAST 4.5.2 for this migration");
        },
        'no longer supported',
        '--await-precedence',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(1, "Use HHAST 4.5.2 for this migration");
        },
        'no longer supported',
        '--hhvm-4.5-to-4.6',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(1, 'Use HHAST 4.6.1 for this migration');
        },
        'no longer supported',
        '--empty-expression',
      ),
      CLIOptions\flag(
        () ==> {
          throw new ExitException(1, 'Use HHAST 4.6.1 for this migration');
        },
        'no longer supported',
        '--hhvm-4.6-to-4.7',
      ),
      CLIOptions\flag(
        () ==> {
          $this->migrations[] = AddFixmesMigration::class;
        },
        'Add /* HH_FIXME[] */ comments where needed',
        '--add-fixmes',
      ),
      CLIOptions\flag(
        () ==> {
          $this->includeVendor = true;
        },
        'Also migrate files in vendor/ subdirectories',
        '--include-vendor',
      ),
      CLIOptions\flag(
        () ==> {
          $this->xhprof = true;
        },
        'Enable XHProf profiling',
        '--xhprof',
      ),
    ];

    $options[] = $this->getVerbosityOption();
    return $options;
  }

  final private function migrateFile(
    vec<BaseMigration> $migrations,
    string $file,
  ): void {
    $this->verbosePrintf(
      self::VERBOSE_MIGRATE,
      "Migrating file %s...\n",
      $file,
    );
    if (!self::isHackFile($file)) {
      $this->verbosePrintf(
        self::VERBOSE_MIGRATE_NOT_HACK,
        "Migrating file %s despite it not looking like a Hack file\n",
        $file,
      );
    }
    $ast = \HH\Asio\join(HHAST\from_file_async(HHAST\File::fromPath($file)));
    foreach ($migrations as $migration) {
      $new_ast = $migration->migrateFile($file, $ast);
      if ($ast !== $new_ast) {
        $ast = $new_ast;
        // Some migrations need to run the typechecker, so it needs to be up to
        // date on disk
        \file_put_contents($file, $ast->getCode());
      }
    }
  }

  final private function migrateDirectory(
    vec<BaseMigration> $migrations,
    string $directory,
  ): void {
    $need_recursion = false;
    $has_file_list = vec[];
    foreach ($migrations as $migration) {
      if ($migration instanceof IMigrationWithFileList) {
        $has_file_list[] = $migration;
      } else {
        $need_recursion = true;
        break;
      }
    }

    if ($need_recursion) {
      $this->migrateDirectoryByRecursing($migrations, $directory);
      return;
    }

    foreach ($has_file_list as $migration) {
      $files = $migration->getFilePathsToMigrate();
      foreach ($files as $file) {
        $this->migrateFile(vec[$migration], $file);
      }
    }
  }

  final private function migrateDirectoryByRecursing(
    vec<BaseMigration> $migrations,
    string $directory,
  ): void {
    $it = new \RecursiveIteratorIterator(
      new \RecursiveDirectoryIterator($directory),
    );
    foreach ($it as $info) {
      if (!$info->isFile()) {
        continue;
      }
      $file = $info->getPathname();
      if (!$this->includeVendor) {
        if (Str\contains($file, '/.git/')) {
          $this->verbosePrintf(
            self::VERBOSE_SKIP_BECAUSE_GIT,
            "Skipping file '%s' because it is in .git/\n",
            $file,
          );
          continue;
        }
        if (Str\contains($file, '/vendor/')) {
          $this->verbosePrintf(
            self::VERBOSE_SKIP_BECAUSE_VENDOR,
            "Skipping file '%s' because it is in vendor/\n",
            $file,
          );
          continue;
        }
        if (!self::isHackFile($file)) {
          $this->verbosePrintf(
            self::VERBOSE_SKIP_BECAUSE_NOT_HACK,
            "Skipping file '%s' because it is not a Hack file\n",
            $file,
          );
          continue;
        }
      }
      $this->migrateFile($migrations, $file);
    }
  }

  <<__Override>>
  public async function mainAsync(): Awaitable<int> {
    if ($this->xhprof) {
      XHProf::enable();
    }
    $result = await $this->mainImplAsync();
    if ($this->xhprof) {
      XHProf::disableAndDump(\STDERR);
    }
    return $result;
  }

  private async function mainImplAsync(): Awaitable<int> {
    $err = $this->getStderr();
    if (C\is_empty($this->migrations)) {
      await $err->writeAsync("You must specify at least one migration!\n\n");
      $this->displayHelp($err);
      return 1;
    }

    $args = $this->getArguments();
    if (C\is_empty($args)) {
      await $err->writeAsync("You must specify at least one path!\n\n");
      $this->displayHelp($err);
      return 1;
    }
    foreach ($args as $path) {
      $migrations = Vec\map($this->migrations, $class ==> new $class($path));
      if (\is_file($path)) {
        $this->migrateFile($migrations, $path);
        continue;
      }
      if (\is_dir($path)) {
        $this->migrateDirectory($migrations, $path);
        continue;
      }

      /* HHAST_IGNORE_ERROR[DontAwaitInALoop] */
      await $err->writeAsync(
        Str\format("Don't know how to process path: %s\n", $path),
      );
      return 1;
    }
    return 0;
  }

  private static ?(string, bool) $lastFileIsHack = null;

  private static function isHackFile(string $file): bool {
    if (self::$lastFileIsHack is nonnull) {
      list($cache_file, $cache_result) = self::$lastFileIsHack;
      if ($cache_file === $file) {
        return $cache_result;
      }
    }

    $f = \fopen($file, 'r');
    $prefix = \fread($f, 4);
    if ($prefix === '<?hh') {
      self::$lastFileIsHack = tuple($file, true);
      return true;
    }

    if (!Str\starts_with($prefix, '#!')) {
      self::$lastFileIsHack = tuple($file, false);
      return false;
    }
    \rewind($f);
    $_shebang = \fgets($f);
    $prefix = \fread($f, 4);

    $is_hh = $prefix === '<?hh';

    self::$lastFileIsHack = tuple($file, $is_hh);
    return $is_hh;
  }
}
