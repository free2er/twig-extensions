<?php

namespace Free2er\Twig\Extension;

use Twig_Extension as TwigExtension;
use Twig_SimpleFunction as TwigFunction;

/**
 * Расширение определения имени класса
 *
 * Использование:
 * class(<variable>)
 *
 * Пример:
 * {{ class(test_var) }}
 */
class ClassExtension extends TwigExtension
{
    /**
     * Возвращает функции
     *
     * @return array
     */
    public function getFunctions()
    {
        return [new TwigFunction($this->getName(), 'get_class')];
    }

    /**
     * Возвращает наименование
     *
     * @return string
     */
    public function getName()
    {
        return 'class';
    }
}
