### Магазин свистулек
У нас есть фабрика по производству свистулек. Мы хотим сделать для нее интернет-магазин. 

Наши свистульки характеризуются следующими признаками:
1. Материал изготовления: глина, дерево или пластик
2. Громкостью: тихая или громкая
3. Росписью: гжельская, хохломская, мезенская, жостовская, городецкая

Так же мы хотим показывать артикул, название каждой свистульки, ее короткое описание и набор фотографий.

Мы хотим чтобы пользователи могли легко и быстро находить товары в нашем магазине, поэтому именно вам поручено 
написать быструю функцию поиска. Так как мы хотим очень быстрый поиск вам доверено спроектировать и БД. Искать
 мы хотим позволить только по признакам товара, по названию и описанию поиска не нужно.
 
 Ваша задача: 
 1. Выбрать БД для хранения информации о товаре и описать ее структуру. Обосновать выбор.
 2. Написать метод search класса Search на PHP, который принимал бы на вход объект класса Request (его структура ниже) 
 и возвращал артикулы подходящих свистулек. Класс Request можно дописывать.
 ```
class SearchRequest {
    private $materials = [];
    private $sounds = [];
    private $arts = [];

    public function __construct(
        array $materials,
        array $sounds,
        array $arts
    ) {
        $this->materials = $materials;
        $this->sounds = $sounds;
        $this->arts = $arts;
    }

    public function getMaterials(): array 
    {
        return $this->materials;
    }

    public function getSounds(): array 
    {
        return $this->sounds;
    }

    public function getArts(): array 
    {
        return $this->arts;
    }
}

class Searcher {
    public function search(SearchRequest $request): array
    {
        
    }
}
```
 