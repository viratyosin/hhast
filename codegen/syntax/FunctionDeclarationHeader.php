<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f79fe2d444282c3322709890ca129a88>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class FunctionDeclarationHeader extends EditableSyntax {

  private EditableSyntax $_async;
  private EditableSyntax $_coroutine;
  private EditableSyntax $_keyword;
  private EditableSyntax $_ampersand;
  private EditableSyntax $_name;
  private EditableSyntax $_type_parameter_list;
  private EditableSyntax $_left_paren;
  private EditableSyntax $_parameter_list;
  private EditableSyntax $_right_paren;
  private EditableSyntax $_colon;
  private EditableSyntax $_type;
  private EditableSyntax $_where_clause;

  public function __construct(
    EditableSyntax $async,
    EditableSyntax $coroutine,
    EditableSyntax $keyword,
    EditableSyntax $ampersand,
    EditableSyntax $name,
    EditableSyntax $type_parameter_list,
    EditableSyntax $left_paren,
    EditableSyntax $parameter_list,
    EditableSyntax $right_paren,
    EditableSyntax $colon,
    EditableSyntax $type,
    EditableSyntax $where_clause,
  ) {
    parent::__construct('function_declaration_header');
    $this->_async = $async;
    $this->_coroutine = $coroutine;
    $this->_keyword = $keyword;
    $this->_ampersand = $ampersand;
    $this->_name = $name;
    $this->_type_parameter_list = $type_parameter_list;
    $this->_left_paren = $left_paren;
    $this->_parameter_list = $parameter_list;
    $this->_right_paren = $right_paren;
    $this->_colon = $colon;
    $this->_type = $type;
    $this->_where_clause = $where_clause;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $async = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_async'],
      $position,
      $source,
    );
    $position += $async->width();
    $coroutine = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_coroutine'],
      $position,
      $source,
    );
    $position += $coroutine->width();
    $keyword = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_keyword'],
      $position,
      $source,
    );
    $position += $keyword->width();
    $ampersand = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_ampersand'],
      $position,
      $source,
    );
    $position += $ampersand->width();
    $name = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_name'],
      $position,
      $source,
    );
    $position += $name->width();
    $type_parameter_list = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_type_parameter_list'],
      $position,
      $source,
    );
    $position += $type_parameter_list->width();
    $left_paren = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_left_paren'],
      $position,
      $source,
    );
    $position += $left_paren->width();
    $parameter_list = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_parameter_list'],
      $position,
      $source,
    );
    $position += $parameter_list->width();
    $right_paren = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_right_paren'],
      $position,
      $source,
    );
    $position += $right_paren->width();
    $colon = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_colon'],
      $position,
      $source,
    );
    $position += $colon->width();
    $type = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_type'],
      $position,
      $source,
    );
    $position += $type->width();
    $where_clause = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['function_where_clause'],
      $position,
      $source,
    );
    $position += $where_clause->width();
    return new self(
      $async,
      $coroutine,
      $keyword,
      $ampersand,
      $name,
      $type_parameter_list,
      $left_paren,
      $parameter_list,
      $right_paren,
      $colon,
      $type,
      $where_clause,
    );
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'async' => $this->_async;
    yield 'coroutine' => $this->_coroutine;
    yield 'keyword' => $this->_keyword;
    yield 'ampersand' => $this->_ampersand;
    yield 'name' => $this->_name;
    yield 'type_parameter_list' => $this->_type_parameter_list;
    yield 'left_paren' => $this->_left_paren;
    yield 'parameter_list' => $this->_parameter_list;
    yield 'right_paren' => $this->_right_paren;
    yield 'colon' => $this->_colon;
    yield 'type' => $this->_type;
    yield 'where_clause' => $this->_where_clause;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $async = $this->_async->rewrite($rewriter, $parents);
    $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $ampersand = $this->_ampersand->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $type_parameter_list = $this->_type_parameter_list->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $where_clause = $this->_where_clause->rewrite($rewriter, $parents);
    if (
      $async === $this->_async &&
      $coroutine === $this->_coroutine &&
      $keyword === $this->_keyword &&
      $ampersand === $this->_ampersand &&
      $name === $this->_name &&
      $type_parameter_list === $this->_type_parameter_list &&
      $left_paren === $this->_left_paren &&
      $parameter_list === $this->_parameter_list &&
      $right_paren === $this->_right_paren &&
      $colon === $this->_colon &&
      $type === $this->_type &&
      $where_clause === $this->_where_clause
    ) {
      return $this;
    }
    return new self(
      $async,
      $coroutine,
      $keyword,
      $ampersand,
      $name,
      $type_parameter_list,
      $left_paren,
      $parameter_list,
      $right_paren,
      $colon,
      $type,
      $where_clause,
    );
  }

  public function getAsyncUNTYPED(): EditableSyntax {
    return $this->_async;
  }

  public function withAsync(EditableSyntax $value): this {
    if ($value === $this->_async) {
      return $this;
    }
    return new self(
      $value,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasAsync(): bool {
    return !$this->_async->is_missing();
  }

  public function getAsync(): ?AsyncToken {
    if ($this->_async->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(AsyncToken::class, $this->_async);
  }

  public function getAsyncx(): AsyncToken {
    return TypeAssert::isInstanceOf(AsyncToken::class, $this->_async);
  }

  public function getCoroutineUNTYPED(): EditableSyntax {
    return $this->_coroutine;
  }

  public function withCoroutine(EditableSyntax $value): this {
    if ($value === $this->_coroutine) {
      return $this;
    }
    return new self(
      $this->_async,
      $value,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasCoroutine(): bool {
    return !$this->_coroutine->is_missing();
  }

  public function getCoroutine(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_coroutine);
  }

  public function getKeywordUNTYPED(): EditableSyntax {
    return $this->_keyword;
  }

  public function withKeyword(EditableSyntax $value): this {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $value,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->is_missing();
  }

  public function getKeyword(): ?FunctionToken {
    if ($this->_keyword->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(FunctionToken::class, $this->_keyword);
  }

  public function getKeywordx(): FunctionToken {
    return TypeAssert::isInstanceOf(FunctionToken::class, $this->_keyword);
  }

  public function getAmpersandUNTYPED(): EditableSyntax {
    return $this->_ampersand;
  }

  public function withAmpersand(EditableSyntax $value): this {
    if ($value === $this->_ampersand) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $value,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasAmpersand(): bool {
    return !$this->_ampersand->is_missing();
  }

  public function getAmpersand(): ?AmpersandToken {
    if ($this->_ampersand->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(AmpersandToken::class, $this->_ampersand);
  }

  public function getAmpersandx(): AmpersandToken {
    return TypeAssert::isInstanceOf(AmpersandToken::class, $this->_ampersand);
  }

  public function getNameUNTYPED(): EditableSyntax {
    return $this->_name;
  }

  public function withName(EditableSyntax $value): this {
    if ($value === $this->_name) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $value,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasName(): bool {
    return !$this->_name->is_missing();
  }

  public function getName(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_name);
  }

  public function getTypeParameterListUNTYPED(): EditableSyntax {
    return $this->_type_parameter_list;
  }

  public function withTypeParameterList(EditableSyntax $value): this {
    if ($value === $this->_type_parameter_list) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $value,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasTypeParameterList(): bool {
    return !$this->_type_parameter_list->is_missing();
  }

  public function getTypeParameterList(): ?TypeParameters {
    if ($this->_type_parameter_list->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(TypeParameters::class, $this->_type_parameter_list);
  }

  public function getTypeParameterListx(): TypeParameters {
    return TypeAssert::isInstanceOf(TypeParameters::class, $this->_type_parameter_list);
  }

  public function getLeftParenUNTYPED(): EditableSyntax {
    return $this->_left_paren;
  }

  public function withLeftParen(EditableSyntax $value): this {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $value,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->is_missing();
  }

  public function getLeftParen(): ?LeftParenToken {
    if ($this->_left_paren->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(LeftParenToken::class, $this->_left_paren);
  }

  public function getLeftParenx(): LeftParenToken {
    return TypeAssert::isInstanceOf(LeftParenToken::class, $this->_left_paren);
  }

  public function getParameterListUNTYPED(): EditableSyntax {
    return $this->_parameter_list;
  }

  public function withParameterList(EditableSyntax $value): this {
    if ($value === $this->_parameter_list) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasParameterList(): bool {
    return !$this->_parameter_list->is_missing();
  }

  public function getParameterList(): ?EditableList {
    if ($this->_parameter_list->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(EditableList::class, $this->_parameter_list);
  }

  public function getParameterListx(): EditableList {
    return TypeAssert::isInstanceOf(EditableList::class, $this->_parameter_list);
  }

  public function getRightParenUNTYPED(): EditableSyntax {
    return $this->_right_paren;
  }

  public function withRightParen(EditableSyntax $value): this {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $value,
      $this->_colon,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->is_missing();
  }

  public function getRightParen(): ?RightParenToken {
    if ($this->_right_paren->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(RightParenToken::class, $this->_right_paren);
  }

  public function getRightParenx(): RightParenToken {
    return TypeAssert::isInstanceOf(RightParenToken::class, $this->_right_paren);
  }

  public function getColonUNTYPED(): EditableSyntax {
    return $this->_colon;
  }

  public function withColon(EditableSyntax $value): this {
    if ($value === $this->_colon) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $value,
      $this->_type,
      $this->_where_clause,
    );
  }

  public function hasColon(): bool {
    return !$this->_colon->is_missing();
  }

  public function getColon(): ?ColonToken {
    if ($this->_colon->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(ColonToken::class, $this->_colon);
  }

  public function getColonx(): ColonToken {
    return TypeAssert::isInstanceOf(ColonToken::class, $this->_colon);
  }

  public function getTypeUNTYPED(): EditableSyntax {
    return $this->_type;
  }

  public function withType(EditableSyntax $value): this {
    if ($value === $this->_type) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $value,
      $this->_where_clause,
    );
  }

  public function hasType(): bool {
    return !$this->_type->is_missing();
  }

  public function getType(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_type);
  }

  public function getWhereClauseUNTYPED(): EditableSyntax {
    return $this->_where_clause;
  }

  public function withWhereClause(EditableSyntax $value): this {
    if ($value === $this->_where_clause) {
      return $this;
    }
    return new self(
      $this->_async,
      $this->_coroutine,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $value,
    );
  }

  public function hasWhereClause(): bool {
    return !$this->_where_clause->is_missing();
  }

  public function getWhereClause(): ?WhereClause {
    if ($this->_where_clause->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(WhereClause::class, $this->_where_clause);
  }

  public function getWhereClausex(): WhereClause {
    return TypeAssert::isInstanceOf(WhereClause::class, $this->_where_clause);
  }
}
