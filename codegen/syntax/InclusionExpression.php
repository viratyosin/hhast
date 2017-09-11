<?hh
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<895e4440d628cadc1501b3b374561e81>>
 */
namespace Facebook\HHAST;
use type Facebook\TypeAssert\TypeAssert;

final class InclusionExpression extends EditableSyntax {

  private EditableSyntax $_require;
  private EditableSyntax $_filename;

  public function __construct(
    EditableSyntax $require,
    EditableSyntax $filename,
  ) {
    parent::__construct('inclusion_expression');
    $this->_require = $require;
    $this->_filename = $filename;
  }

  public static function from_json(
    array<string, mixed> $json,
    int $position,
    string $source,
  ): this {
    $require = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['inclusion_require'],
      $position,
      $source,
    );
    $position += $require->width();
    $filename = EditableSyntax::from_json(
      /* UNSAFE_EXPR */ $json['inclusion_filename'],
      $position,
      $source,
    );
    $position += $filename->width();
    return new self($require, $filename);
  }

  public function children(): KeyedTraversable<string, EditableSyntax> {
    yield 'require' => $this->_require;
    yield 'filename' => $this->_filename;
  }

  public function rewrite_children(
    self::TRewriter $rewriter,
    ?Traversable<EditableSyntax> $parents = null,
  ): this {
    $parents = $parents === null ? vec[] : vec($parents);
    $parents[] = $this;
    $require = $this->_require->rewrite($rewriter, $parents);
    $filename = $this->_filename->rewrite($rewriter, $parents);
    if (
      $require === $this->_require &&
      $filename === $this->_filename
    ) {
      return $this;
    }
    return new self($require, $filename);
  }

  public function raw_require(): EditableSyntax {
    return $this->_require;
  }

  public function with_require(EditableSyntax $value): this {
    if ($value === $this->_require) {
      return $this;
    }
    return new self($value, $this->_filename);
  }

  public function require(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_require);
  }

  public function raw_filename(): EditableSyntax {
    return $this->_filename;
  }

  public function with_filename(EditableSyntax $value): this {
    if ($value === $this->_filename) {
      return $this;
    }
    return new self($this->_require, $value);
  }

  public function filename(): EditableSyntax {
    return TypeAssert::isInstanceOf(EditableSyntax::class, $this->_filename);
  }
}
