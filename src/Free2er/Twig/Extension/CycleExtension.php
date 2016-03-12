<?php

namespace Free2er\Twig\Extension;

use Twig_Extension as TwigExtension;

/**
 * Расширение циклов Twig
 *
 * Использование:
 * {% while <condition>%}
 * <!-- loop body -->
 * {% endwhile %}
 *
 * Пример:
 * {% while test_var == 'true' %}
 * {% endwhile %}
 */
class CycleExtension extends TwigExtension
{
    /**
     * Возвращает парсеры выражений
     *
     * @return array
     */
    public function getTokenParsers()
    {
        return [new Cycle\WhileTokenParser()];
    }

    /**
     * Возвращает наименование
     *
     * @return string
     */
    public function getName()
    {
        return 'cycle';
    }
}
