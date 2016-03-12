<?php

namespace Free2er\Twig\Extension\Cycle;

use Twig_TokenParser as TwigTokenParser;
use Twig_Token as TwigToken;

/**
 * Парсер While-выражений
 */
class WhileTokenParser extends TwigTokenParser
{
    /**
     * Разбирает выражение
     *
     * @param TwigToken $token Токен.
     *
     * @return WhileNode
     */
    public function parse(TwigToken $token)
    {
        $lineNumber = $token->getLine();
        $condition  = $this->parser->getExpressionParser()->parseExpression();

        $stream = $this->parser->getStream();
        $stream->expect(TwigToken::BLOCK_END_TYPE);

        $callback = function (TwigToken $token) {
            return $token->test(['endwhile']);
        };

        $body = $this->parser->subparse($callback, true);
        $stream->expect(TwigToken::BLOCK_END_TYPE);

        return new WhileNode($condition, $body, $lineNumber, $this->getTag());
    }

    /**
     * Возвращает наименование тега
     *
     * @return string
     */
    public function getTag()
    {
        return 'while';
    }
}
