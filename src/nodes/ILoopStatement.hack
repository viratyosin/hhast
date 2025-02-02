/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\HHAST;

interface ILoopStatement extends IControlFlowStatement {
  public function getBody(): ?Node;
  public function withBody(Node $body): this;
}
