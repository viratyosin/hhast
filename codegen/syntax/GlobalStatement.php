<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0c2fae66a02c735c9bed198172944bd8>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class GlobalStatement extends EditableSyntax {

  private EditableSyntax $_keyword;
  private EditableSyntax $_variables;
  private EditableSyntax $_semicolon;

  public function __construct(
    EditableSyntax $keyword,
    EditableSyntax $variables,
    EditableSyntax $semicolon,
  ) {
    parent::__construct('global_statement');
    $this->_keyword = $keyword;
    $this->_variables = $variables;
    $this->_semicolon = $semicolon;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $keyword = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['global_keyword'],
      $position,
      $source,
    );
    $position += $keyword->width();
    $variables = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['global_variables'],
      $position,
      $source,
    );
    $position += $variables->width();
    $semicolon = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['global_semicolon'],
      $position,
      $source,
    );
    $position += $semicolon->width();
    return new self($keyword, $variables, $semicolon);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'keyword' => $this->_keyword;
    yield 'variables' => $this->_variables;
    yield 'semicolon' => $this->_semicolon;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $variables = $this->_variables->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $variables === $this->_variables &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new self($keyword, $variables, $semicolon);
  }

  public function getKeywordUNTYPED(): EditableSyntax {
    return $this->_keyword;
  }

  public function withKeyword(EditableSyntax $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new self($value, $this->_variables, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->is_missing();
  }

  public function getKeyword(): GlobalToken {
    return TypeAssert::isInstanceOf(GlobalToken::class, $this->_keyword);
  }

  public function getVariablesUNTYPED(): EditableSyntax {
    return $this->_variables;
  }

  public function withVariables(EditableSyntax $value): this {
    if ($value === $this->_variables) {
      return $this;
    }
    return new self($this->_keyword, $value, $this->_semicolon);
  }

  public function hasVariables(): bool {
    return !$this->_variables->is_missing();
  }

  public function getVariables(): EditableList {
    return TypeAssert::isInstanceOf(EditableList::class, $this->_variables);
  }

  public function getSemicolonUNTYPED(): EditableSyntax {
    return $this->_semicolon;
  }

  public function withSemicolon(EditableSyntax $value): this {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new self($this->_keyword, $this->_variables, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->is_missing();
  }

  public function getSemicolon(): SemicolonToken {
    return TypeAssert::isInstanceOf(SemicolonToken::class, $this->_semicolon);
  }
}
