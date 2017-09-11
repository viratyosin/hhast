<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d288d93368841cedd73fd1669bdff150>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class ConditionalExpression extends EditableSyntax {

  private EditableSyntax $_test;
  private EditableSyntax $_question;
  private EditableSyntax $_consequence;
  private EditableSyntax $_colon;
  private EditableSyntax $_alternative;

  public function __construct(
    EditableSyntax $test,
    EditableSyntax $question,
    EditableSyntax $consequence,
    EditableSyntax $colon,
    EditableSyntax $alternative,
  ) {
    parent::__construct('conditional_expression');
    $this->_test = $test;
    $this->_question = $question;
    $this->_consequence = $consequence;
    $this->_colon = $colon;
    $this->_alternative = $alternative;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $test = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['conditional_test'],
      $position,
      $source,
    );
    $position += $test->width();
    $question = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['conditional_question'],
      $position,
      $source,
    );
    $position += $question->width();
    $consequence = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['conditional_consequence'],
      $position,
      $source,
    );
    $position += $consequence->width();
    $colon = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['conditional_colon'],
      $position,
      $source,
    );
    $position += $colon->width();
    $alternative = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['conditional_alternative'],
      $position,
      $source,
    );
    $position += $alternative->width();
    return new self($test, $question, $consequence, $colon, $alternative);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'test' => $this->_test;
    yield 'question' => $this->_question;
    yield 'consequence' => $this->_consequence;
    yield 'colon' => $this->_colon;
    yield 'alternative' => $this->_alternative;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $test = $this->_test->rewrite($rewriter, $parents);
    $question = $this->_question->rewrite($rewriter, $parents);
    $consequence = $this->_consequence->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $alternative = $this->_alternative->rewrite($rewriter, $parents);
    if (
      $test === $this->_test &&
      $question === $this->_question &&
      $consequence === $this->_consequence &&
      $colon === $this->_colon &&
      $alternative === $this->_alternative
    ) {
      return $this;
    }
    return new self($test, $question, $consequence, $colon, $alternative);
  }

  public function raw_test(): EditableSyntax {
    return $this->_test;
  }

  public function with_test(EditableSyntax $value): this {
    if ($value === $this->_test) {
      return $this;
    }
    return new self(
      $value,
      $this->_question,
      $this->_consequence,
      $this->_colon,
      $this->_alternative,
    );
  }

  public function test(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_test);
  }

  public function raw_question(): EditableSyntax {
    return $this->_question;
  }

  public function with_question(EditableSyntax $value): this {
    if ($value === $this->_question) {
      return $this;
    }
    return new self(
      $this->_test,
      $value,
      $this->_consequence,
      $this->_colon,
      $this->_alternative,
    );
  }

  public function question(): QuestionToken {
    return TypeAssert::isInstanceOf(QuestionToken::class, $this->_question);
  }

  public function raw_consequence(): EditableSyntax {
    return $this->_consequence;
  }

  public function with_consequence(EditableSyntax $value): this {
    if ($value === $this->_consequence) {
      return $this;
    }
    return new self(
      $this->_test,
      $this->_question,
      $value,
      $this->_colon,
      $this->_alternative,
    );
  }

  public function consequence(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_consequence);
  }

  public function raw_colon(): EditableSyntax {
    return $this->_colon;
  }

  public function with_colon(EditableSyntax $value): this {
    if ($value === $this->_colon) {
      return $this;
    }
    return new self(
      $this->_test,
      $this->_question,
      $this->_consequence,
      $value,
      $this->_alternative,
    );
  }

  public function colon(): ?ColonToken {
    if ($this->_colon->is_missing()) {
      return null;
    }
    return TypeAssert::isInstanceOf(ColonToken::class, $this->_colon);
  }

  public function colonx(): ColonToken {
    return TypeAssert::isInstanceOf(ColonToken::class, $this->_colon);
  }

  public function raw_alternative(): EditableSyntax {
    return $this->_alternative;
  }

  public function with_alternative(EditableSyntax $value): this {
    if ($value === $this->_alternative) {
      return $this;
    }
    return new self(
      $this->_test,
      $this->_question,
      $this->_consequence,
      $this->_colon,
      $value,
    );
  }

  public function alternative(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_alternative);
  }
}
