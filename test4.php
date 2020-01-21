<?php
declare(strict_types=1);

/*
 * Код должен выводить массив от 1 до 10.
 * Формироваться этот массив ДОЛЖЕН внутри метода fill класса Filler
 * Который ДОЛЖЕН использовать метод inc класса Container
 * Который в свою очередь ДОЛЖЕН использовать метод increment трейта IncrementerTrait
 * Проверки типов убирать нельзя (можно менять, но они должны оставаться)
 * Таким образом структуру существующего кода менять нельзя (но можно привносить свое).
 * Заставьте это работать!
 */

trait IncrementerTrait
{
    public function increment(int $a): int
    {
        return $a++;
    }
}

class Container
{
    use IncrementerTrait;
    /** @var int  */
    private $val = 0;

    /**
     * @return int
     */
    public function inc(): int
    {
        return $this->val = $this->increment($this->val);
    }

    /**
     * @return int
     */
    public function getVal(): int
    {
        return $this->val;
    }

}

class Filler
{
    /** @var object|null  */
    private $container = null;
    /** @var int[]  */
    private $result = [];

    /**
     * Filler constructor.
     *
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @param int $cnt
     *
     * @return array
     */
    public function fill(int $cnt): array
    {
        if (!($this->container instanceof IncrementerTrait)) {
            return $this->result;
        }
        for ($i = 0; $i < $cnt; $i++) {
            $this->result[] = $this->container->inc();
        }

        return $this->result;
    }
}

$f = new Filler(new Container());
var_dump($f->fill(10));