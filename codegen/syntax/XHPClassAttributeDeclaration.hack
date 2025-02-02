/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fb05156869770b52ca64f0280c3b18ae>>
 */
namespace Facebook\HHAST;
use namespace Facebook\TypeAssert;

<<__ConsistentConstruct>>
final class XHPClassAttributeDeclaration
  extends Node
  implements IClassBodyDeclaration {

  const string SYNTAX_KIND = 'xhp_class_attribute_declaration';

  private Node $_keyword;
  private Node $_attributes;
  private Node $_semicolon;

  public function __construct(
    Node $keyword,
    Node $attributes,
    Node $semicolon,
    ?__Private\SourceRef $source_ref = null,
  ) {
    $this->_keyword = $keyword;
    $this->_attributes = $attributes;
    $this->_semicolon = $semicolon;
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
    $keyword = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_attribute_keyword'],
      $file,
      $offset,
      $source,
      'AttributeToken',
    );
    $offset += $keyword->getWidth();
    $attributes = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_attribute_attributes'],
      $file,
      $offset,
      $source,
      'NodeList<ListItem<Node>>',
    );
    $offset += $attributes->getWidth();
    $semicolon = Node::fromJSON(
      /* HH_FIXME[4110] */ $json['xhp_attribute_semicolon'],
      $file,
      $offset,
      $source,
      'SemicolonToken',
    );
    $offset += $semicolon->getWidth();
    $source_ref = shape(
      'file' => $file,
      'source' => $source,
      'offset' => $initial_offset,
      'width' => $offset - $initial_offset,
    );
    return new static($keyword, $attributes, $semicolon, $source_ref);
  }

  <<__Override>>
  public function getChildren(): dict<string, Node> {
    return dict[
      'keyword' => $this->_keyword,
      'attributes' => $this->_attributes,
      'semicolon' => $this->_semicolon,
    ];
  }

  <<__Override>>
  public function rewriteChildren(
    self::TRewriter $rewriter,
    vec<Node> $parents = vec[],
  ): this {
    $parents[] = $this;
    $keyword = $rewriter($this->_keyword, $parents);
    $attributes = $rewriter($this->_attributes, $parents);
    $semicolon = $rewriter($this->_semicolon, $parents);
    if (
      $keyword === $this->_keyword &&
      $attributes === $this->_attributes &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $attributes, $semicolon);
  }

  public function getKeywordUNTYPED(): Node {
    return $this->_keyword;
  }

  public function withKeyword(Node $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static($value, $this->_attributes, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return AttributeToken
   */
  public function getKeyword(): AttributeToken {
    return TypeAssert\instance_of(AttributeToken::class, $this->_keyword);
  }

  /**
   * @return AttributeToken
   */
  public function getKeywordx(): AttributeToken {
    return $this->getKeyword();
  }

  public function getAttributesUNTYPED(): Node {
    return $this->_attributes;
  }

  public function withAttributes(Node $value): this {
    if ($value === $this->_attributes) {
      return $this;
    }
    return new static($this->_keyword, $value, $this->_semicolon);
  }

  public function hasAttributes(): bool {
    return !$this->_attributes->isMissing();
  }

  /**
   * @return NodeList<ListItem<XHPClassAttribute>> | NodeList<ListItem<Node>> |
   * NodeList<ListItem<XHPSimpleClassAttribute>>
   */
  public function getAttributes(): NodeList<ListItem<Node>> {
    return TypeAssert\instance_of(NodeList::class, $this->_attributes);
  }

  /**
   * @return NodeList<ListItem<XHPClassAttribute>> | NodeList<ListItem<Node>> |
   * NodeList<ListItem<XHPSimpleClassAttribute>>
   */
  public function getAttributesx(): NodeList<ListItem<Node>> {
    return $this->getAttributes();
  }

  public function getSemicolonUNTYPED(): Node {
    return $this->_semicolon;
  }

  public function withSemicolon(Node $value): this {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new static($this->_keyword, $this->_attributes, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
