/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cf4c17528871d2b0e80f9fb8b2039206>>
 */
namespace Facebook\HHAST;

final class InterfaceToken extends EditableTokenWithVariableText {

  const string KIND = 'interface';

  public function __construct(
    EditableNode $leading,
    EditableNode $trailing,
    string $token_text = 'interface',
    ?__Private\SourceRef $source_ref = null,
  ) {
    parent::__construct($leading, $trailing, $token_text, $source_ref);
  }

  public function hasLeading(): bool {
    return !$this->getLeading()->isMissing();
  }

  <<__Override>>
  public function withLeading(EditableNode $value): this {
    if ($value === $this->getLeading()) {
      return $this;
    }
    return new self($value, $this->getTrailing());
  }

  public function hasTrailing(): bool {
    return !$this->getTrailing()->isMissing();
  }

  <<__Override>>
  public function withTrailing(EditableNode $value): this {
    if ($value === $this->getTrailing()) {
      return $this;
    }
    return new self($this->getLeading(), $value);
  }

  <<__Override>>
  public function rewriteDescendants(
    self::TRewriter $rewriter,
    vec<EditableNode> $parents = vec[],
  ): this {
    $parents[] = $this;
    $leading = $this->getLeading()->rewrite($rewriter, $parents);
    $trailing = $this->getTrailing()->rewrite($rewriter, $parents);
    if (
      $leading === $this->getLeading() && $trailing === $this->getTrailing()
    ) {
      return $this;
    }
    return new self($leading, $trailing);
  }
}