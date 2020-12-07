<?php
declare(strict_types=1);

/*
 * Код должен выводить:
 * [-1]
 * [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
 * []
 * То есть метод fill класса Filler должен заполнять массив числами от 1 до $cnt,
 * если его контейнер валидируемый и возвращать массив с -1, если контейнер не валидируемый
 * Небходимо предусмотреть, что валидируемые контейнеры могут быть не только ContainerWithValidation
 * Если контейнер не валидный - должен вернуться пустой массив
 * К сожалению, трейт ValidatorTrait и класс Container - принадлежат вендору и их править нельзя, даже если там ошибки
 */

trait ValidatorTrait
{
    public function validate($a): bool
    {
        if (!is_int($a)) {
            return false;
        }
        if ($a < 0) {
            return false;
        }
        return true;
    }
}

class Container
{
    /** @var int */
    private $val;

    public function __construct(int $a = 0)
    {
        $this->val = $a;
    }

    /**
     * @return int
     */
    public function inc(): int
    {
        return $this->val = $this->increment($this->val);
    }

    /**
     * @param int $a
     *
     * @return int
     */
    protected function increment(int $a): int
    {
        return $a++;
    }

    /**
     * @return int
     */
    public function getVal(): int
    {
        return $this->val;
    }

}

class ContainerWithValidation extends Container
{
    use ValidatorTrait;
}

class Filler
{
    /** @var object|null */
    private $container = null;
    /** @var int[] */
    private $result = [];

    /**
     * Filler constructor.
     *
     * @param $container
     */
    public function __construct(Container $container)
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
        if (!$this->container instanceof ValidatorTrait) {
            return $this->result = [-1];
        }

        if (!$this->container->validate($this->container->getVal())) {
            return $this->result = [false];
        }

        for ($i = 0; $i < $cnt; $i++) {
            $this->result[] = $this->container->inc();
        }

        return $this->result;
    }

    /**
     * @param array $arr
     *
     * @return string
     */
    public function renderArray(array $arr): string
    {
        return "[" . implode(", ", $arr) . "]\n";
    }
}

$f = new Filler(new Container());
echo $f->renderArray($f->fill(10));
$f1 = new Filler(new ContainerWithValidation());
echo $f1->renderArray($f1->fill(10));
$f1 = new Filler(new ContainerWithValidation(-1));
echo $f1->renderArray($f1->fill(10));