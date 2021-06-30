<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use App\Support\Collection;

class CollectionTest extends TestCase
{
    public function testEmptyInstantiatedCollectionReturnsNoItems(): void
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }

    public function testCountIsCorrectForItemsPassedIn(): void
    {
        $collection = new Collection(['one', 'two', 'three']);

        $this->assertEquals(3, $collection->count());
    }

    public function testsItemsReturnedMuchItemsPassedIn(): void
    {
        $collection = new Collection(['one', 'two']);

        $this->assertCount(2, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }

    public function testCollectionIsInstanceOfIteratorAgregate(): void
    {
        $collection = new Collection();
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    public function testCollectionCanBeIterated(): void
    {
        $collection = new Collection(['one', 'two', 'three']);

        $items = [];

        foreach($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    public function testCollectionCanBeMargedWithOtherCollection()
    {
        $collection1 = new Collection(['one', 'two', 'three']);
        $collection2 = new Collection(['four', 'five']);
        
        $collection1->marge($collection2);

        $this->assertCount(5, $collection1);
        $this->assertEquals(5, $collection1->count());
    }

    public function testCanAddToExistingCollection()
    {
        $collection = new Collection(['one', 'two']);
        
        $collection->add(['three']);

        $this->assertCount(3, $collection->get());
        $this->assertEquals(3, $collection->count());
    }

    public function testReturnsEncodedJsonItems()
    {
        $collection = new Collection([
            ['username' => 'Billy'],
            ['username' => 'Alex']
        ]);

        $this->assertIsString('string', $collection->toJson());
        $this->assertEquals('[{"username":"Billy"},{"username":"Alex"}]', $collection->toJson());
    }

    public function testJsonEncodingACollectionObjectReturJson()
    {
        $collection = new Collection([
            ['username' => 'Billy'],
            ['username' => 'Alex']
        ]);

        $encoding = json_encode($collection);

        $this->assertIsString($encoding);
        $this->assertEquals('[{"username":"Billy"},{"username":"Alex"}]', $encoding);
    }
}
