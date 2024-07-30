<?php

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;
use function sprintf;
use function trim;

/**
 * @implements Rule<Node\FunctionLike>
 */
class MissingPhpDocRule implements Rule
{
	public function getNodeType(): string
	{
		return Node\FunctionLike::class;
	}

	public function processNode(Node $node, Scope $scope): array
	{
		$docComment = $node->getDocComment();
		$errors = [];
		if ($docComment === null) {
			$functionName = null;
			if ($node instanceof Node\Stmt\ClassMethod) {
				$functionName = $node->name->name;
			} elseif ($node instanceof Node\Stmt\Function_) {
				$functionName = trim($scope->getNamespace() . '\\' . $node->name->name, '\\');
			} else {
				return [];
			}
			$errors[] = RuleErrorBuilder::message(sprintf(
				'Missing PHPDoc documentation in method %s.',
				$functionName,
			))->build();
		}

		return $errors;
	}
}
