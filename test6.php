<?php
declare(strict_types=1);

define("INDEX_LEN", 10000);
define("SEARCH_SEQUENCE_LENGTH", 100000);
define("MAX_RAND", 1000000);

class Index {
    private $index = [];

    public function __construct(int $len)
    {
        for ($i = 0; $i < $len; $i++) {
            $this->index[$i] = mt_rand(0, MAX_RAND);
        }
    }

    //ваш код тут. Помимо реализации функции поиска допустима предобработка индекса (можно и в конструкторе)

    public function search(int $val): bool
    {
        return false;
    }

}
$index = new Index(INDEX_LEN);
$results = [];
$timeStart = microtime(true);

for ($i = 0; $i < SEARCH_SEQUENCE_LENGTH; $i++) {
    $r = mt_rand(0, MAX_RAND);
    if ($index->search($r)) {
        isset($results[$r]) ? $results[$r]++ : $results[$r] = 1;
    }
}

$timeElapsed = microtime(true) - $timeStart;
echo sprintf("time elapsed %f sec\n", $timeElapsed);
echo json_encode($results, JSON_PRETTY_PRINT) . "\n";