<?php

namespace Free2er\Twig\Extension;

use Twig_Extension as TwigExtension;
use Twig_SimpleTest as TwigTest;

/**
 * Расширение определения принадлежности переменной к классу
 *
 * Использование:
 * {% if <переменная> is instanceof(<класс>) %} ...
 *
 * Пример:
 * {% if test_var is instanceOf('DateTime') %} ...
 * {% if test_var is instanceOf('Some\\Namespace\\Class') %} ...
 */
class InstanceOfExtension extends TwigExtension
{
    /**
     * Возвращает тесты
     *
     * @return array
     */
    public function getTests()
    {
        $test = function ($object, $class) {
            return $object instanceof $class;
        };

        return [new TwigTest($this->getName(), $test)];
    }

    /**
     * Возвращает наименование
     *
     * @return string
     */
    public function getName()
    {
        return 'instanceOf';
    }
}
