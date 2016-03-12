<?php

namespace Free2er\Twig\Extension\Cycle;

use Twig_Compiler as TwigCompiler;
use Twig_Node_Expression as TwigNodeExpression;
use Twig_NodeInterface as TwigNodeInterface;
use Twig_Node as TwigNode;

/**
 * Узел While-цикла
 */
class WhileNode extends TwigNode
{
    /**
     * Конструктор
     *
     * @param TwigNodeExpression $expression Выражение.
     * @param TwigNodeInterface  $node       Элемент.
     * @param integer            $lineNumber Номер строки.
     * @param string             $tag        Текущий тег.
     */
    public function __construct(TwigNodeExpression $expression, TwigNodeInterface $node, $lineNumber, $tag = null)
    {
        parent::__construct(['condition' => $expression, 'body' => $node], [], $lineNumber, $tag);
    }

    /**
     * Собирает PHP-выражение
     *
     * @param TwigCompiler $compiler Компилятор Twig.
     *
     * @return void
     */
    public function compile(TwigCompiler $compiler)
    {
        $compiler->addDebugInfo($this);
        $compiler->write('while (');
        $compiler->subcompile($this->getNode('condition'));
        $compiler->write(") {\n");
        $compiler->indent();
        $compiler->subcompile($this->getNode('body'));
        $compiler->outdent();
        $compiler->write("}\n");
    }
}
