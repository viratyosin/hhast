<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fcd37ff927f7bd65a287ca7f327ca535>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class CompoundStatement extends EditableSyntax {

  private EditableSyntax $_left_brace;
  private EditableSyntax $_statements;
  private EditableSyntax $_right_brace;

  public function __construct(
    EditableSyntax $left_brace,
    EditableSyntax $statements,
    EditableSyntax $right_brace,
  ) {
    parent::__construct('compound_statement');
    $this->_left_brace = $left_brace;
    $this->_statements = $statements;
    $this->_right_brace = $right_brace;
  }

  <<__Override>>
  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $left_brace = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['compound_left_brace'],
      $position,
      $source,
    );
    $position += $left_brace->getWidth();
    $statements = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['compound_statements'],
      $position,
      $source,
    );
    $position += $statements->getWidth();
    $right_brace = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['compound_right_brace'],
      $position,
      $source,
    );
    $position += $right_brace->getWidth();
    return new self($left_brace, $statements, $right_brace);
  }

  <<__Override>>
  public function getChildren(): KeyedTraversable<string, EditableSyntax> {
    yield 'left_brace' => $this->_left_brace;
    yield 'statements' => $this->_statements;
    yield 'right_brace' => $this->_right_brace;
  }

  <<__Override>>
  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $statements = $this->_statements->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $statements === $this->_statements &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new self($left_brace, $statements, $right_brace);
  }

  public function getLeftBraceUNTYPED(): EditableSyntax {
    return $this->_left_brace;
  }

  public function withLeftBrace(EditableSyntax $value): this {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new self($value, $this->_statements, $this->_right_brace);
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  public function getLeftBrace(): ?LeftBraceToken {
    if ($this->_left_brace->isMissing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(LeftBraceToken::class, $this->_left_brace);
  }

  public function getLeftBracex(): LeftBraceToken {
    return TypeAssert::isInstanceOf(LeftBraceToken::class, $this->_left_brace);
  }

  public function getStatementsUNTYPED(): EditableSyntax {
    return $this->_statements;
  }

  public function withStatements(EditableSyntax $value): this {
    if ($value === $this->_statements) {
      return $this;
    }
    return new self($this->_left_brace, $value, $this->_right_brace);
  }

  public function hasStatements(): bool {
    return !$this->_statements->isMissing();
  }

  public function getStatements(): ?EditableList {
    if ($this->_statements->isMissing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(EditableList::class, $this->_statements);
  }

  public function getStatementsx(): EditableList {
    return TypeAssert::isInstanceOf(EditableList::class, $this->_statements);
  }

  public function getRightBraceUNTYPED(): EditableSyntax {
    return $this->_right_brace;
  }

  public function withRightBrace(EditableSyntax $value): this {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new self($this->_left_brace, $this->_statements, $value);
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  public function getRightBrace(): ?RightBraceToken {
    if ($this->_right_brace->isMissing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(RightBraceToken::class, $this->_right_brace);
  }

  public function getRightBracex(): RightBraceToken {
    return TypeAssert::isInstanceOf(RightBraceToken::class, $this->_right_brace);
  }
}
