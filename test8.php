<?php
/**
 * Тест должен проходить, т.е. код должен выводить  "Ok!"
 * Код вендора править нельзя
 * Код после строки Read-Only Code править нельзя
 */

/* Dark Ugly Vendor Start */

trait ValidatorTrait
{
    public function validate(?array $a): bool
    {
        if (null === $a) {
            return false;
        }
        if (count($a) < 2 || count($a) > 100) {
            return false;
        }
        return true;
    }
}

class BaseContainer
{
    public function __construct(
        public readonly ?array $content,
    ) {
    }
}

class ContainerRenderer
{
    protected array $pieces = [];

    protected function render(): string
    {
        return (string)json_encode(
            $this->prepareContent(),
            JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE
        );
    }

    protected function prepareContent(): array
    {
        return array_unique(array_merge(...$this->pieces));
    }

    protected function addPiece(BaseContainer $container): void
    {
        $this->pieces[] = $container->content;
    }
}

/* Dark Ugly Vendor End */

/* Our Pretty Cool Code */

class Container1 extends BaseContainer
{
    use ValidatorTrait;
}

class Container2 extends BaseContainer
{

}

class Renderer extends ContainerRenderer
{
    protected array $containers;
    public function __construct(BaseContainer ...$containers)
    {
        $this->containers = count($containers) != 0 ? $containers : [];
    }

    public function renderContainer(): string
    {
        $this->pieces = [];
        foreach ($this->containers as $container) {
            if ($container instanceof ValidatorTrait) {
                if ($container->validate($container->content)) {
                    $this->addPiece($container);
                }
            } else {
                $this->addPiece(new Container2(array_filter($container->content)));
            }
        }
        return $this->render();
    }
}

/* Read-Only Code */
function test(): void
{
    $r1 = new Renderer(
        new Container1([0, 1, 2, 3]),
        new Container2([null, 3, 4, 5]),
        new Container1([5, 6, 7]),
    );

    $assert = $r1->renderContainer() === "[0,1,2,3,4,5,6,7]";

    if ($assert) {
        echo "Ok!";
    } else {
        echo "Fail!";
    }
}

test();