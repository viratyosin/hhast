/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<564edf970d3e104255ef7ef04574b896>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

<<__ConsistentConstruct>>
final class XHPSpreadAttribute extends Node {

  const string SYNTAX_KIND = 'xhp_spread_attribute';

  private Node $_left_brace;
  private Node $_spread_operator;
  private Node $_expression;
  private Node $_right_brace;

  public function __construct(
    Node $left_brace,
    Node $spread_operator,
    Node $expression,
    Node $right_brace,
    ?__Private\SourceRef $source_ref = null,
  ) {
    $this->_left_brace = $left_brace;
    $this->_spread_operator = $spread_operator;
    $this->_expression = $expression;
    $this->_right_brace = $right_brace;
    parent::__construct($source_ref);
  }

  <<__Override>>
  public static function fromJSON(
    dict<string, mixed> $json,
    string $file,
    int $initial_offset,
    string $source,
    string $_type_hint,
  ): this {
    $offset = $initial_offset;
    $left_brace = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_spread_attribute_left_brace'],
      $file,
      $offset,
      $source,
      'LeftBraceToken',
    );
    $offset += $left_brace->getWidth();
    $spread_operator = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_spread_attribute_spread_operator'],
      $file,
      $offset,
      $source,
      'DotDotDotToken',
    );
    $offset += $spread_operator->getWidth();
    $expression = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_spread_attribute_expression'],
      $file,
      $offset,
      $source,
      'IExpression',
    );
    $offset += $expression->getWidth();
    $right_brace = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_spread_attribute_right_brace'],
      $file,
      $offset,
      $source,
      'RightBraceToken',
    );
    $offset += $right_brace->getWidth();
    $source_ref = shape(
      'file' => $file,
      'source' => $source,
      'offset' => $initial_offset,
      'width' => $offset - $initial_offset,
    );
    return new static(
      $left_brace,
      $spread_operator,
      $expression,
      $right_brace,
      $source_ref,
    );
  }

  <<__Override>>
  public function getChildren(): dict<string, Node> {
    return dict[
      'left_brace' => $this->_left_brace,
      'spread_operator' => $this->_spread_operator,
      'expression' => $this->_expression,
      'right_brace' => $this->_right_brace,
    ];
  }

  <<__Override>>
  public function rewriteChildren(
    self::TRewriter $rewriter,
    vec<Node> $parents = vec[],
  ): this {
    $parents[] = $this;
    $left_brace = $rewriter($this->_left_brace, $parents);
    $spread_operator = $rewriter($this->_spread_operator, $parents);
    $expression = $rewriter($this->_expression, $parents);
    $right_brace = $rewriter($this->_right_brace, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $spread_operator === $this->_spread_operator &&
      $expression === $this->_expression &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($left_brace, $spread_operator, $expression, $right_brace);
  }

  public function getLeftBraceUNTYPED(): Node {
    return $this->_left_brace;
  }

  public function withLeftBrace(Node $value): this {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new static(
      $value,
      $this->_spread_operator,
      $this->_expression,
      $this->_right_brace,
    );
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBrace(): LeftBraceToken {
    return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBracex(): LeftBraceToken {
    return $this->getLeftBrace();
  }

  public function getSpreadOperatorUNTYPED(): Node {
    return $this->_spread_operator;
  }

  public function withSpreadOperator(Node $value): this {
    if ($value === $this->_spread_operator) {
      return $this;
    }
    return new static(
      $this->_left_brace,
      $value,
      $this->_expression,
      $this->_right_brace,
    );
  }

  public function hasSpreadOperator(): bool {
    return !$this->_spread_operator->isMissing();
  }

  /**
   * @return DotDotDotToken
   */
  public function getSpreadOperator(): DotDotDotToken {
    return TypeAssert\instance_of(
      DotDotDotToken::class,
      $this->_spread_operator,
    );
  }

  /**
   * @return DotDotDotToken
   */
  public function getSpreadOperatorx(): DotDotDotToken {
    return $this->getSpreadOperator();
  }

  public function getExpressionUNTYPED(): Node {
    return $this->_expression;
  }

  public function withExpression(Node $value): this {
    if ($value === $this->_expression) {
      return $this;
    }
    return new static(
      $this->_left_brace,
      $this->_spread_operator,
      $value,
      $this->_right_brace,
    );
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return VariableExpression | XHPExpression
   */
  public function getExpression(): IExpression {
    return TypeAssert\instance_of(IExpression::class, $this->_expression);
  }

  /**
   * @return VariableExpression | XHPExpression
   */
  public function getExpressionx(): IExpression {
    return $this->getExpression();
  }

  public function getRightBraceUNTYPED(): Node {
    return $this->_right_brace;
  }

  public function withRightBrace(Node $value): this {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new static(
      $this->_left_brace,
      $this->_spread_operator,
      $this->_expression,
      $value,
    );
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBrace(): RightBraceToken {
    return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    return $this->getRightBrace();
  }
}
