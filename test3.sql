CREATE TABLE test
(
    id SERIAL NOT NULL
        CONSTRAINT pk_test
            PRIMARY KEY,
    create_date TIMESTAMP NOT NULL,
    category_name VARCHAR(64) NOT NULL
);

COMMENT ON COLUMN test.id IS 'id';
COMMENT ON COLUMN test.create_date IS 'дата события';
COMMENT ON COLUMN test.category_name IS 'категория события';

CREATE INDEX idx_category_name ON test (category_name);
/*
    Составьте один запрос, который вытащил бы информацию в таком виде:
    название категории, общее число записей в категории, число записей в категории за сегодня, число записей в категории за последний месяц.
    PostgreSQL\MySQL
*/

/*
    Если можете, представьте что это таблица MergeTree в Clickhouse (без поля id) и составьте запрос на диалекте ClickHouse
 */

