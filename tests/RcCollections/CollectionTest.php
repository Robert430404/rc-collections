<?php

namespace RcCollections\Tests;

use PHPUnit\Framework\TestCase;
use RcCollections\Collection;

/**
 * Class CollectionTest
 *
 * @package RcCollections\Tests
 */
class CollectionTest extends TestCase
{
    /**
     * Tests the reverse method on the collection
     *
     * @return void
     */
    public function testCollectionReverse()
    {
        $seedArray  = [1, 2, 3];
        $expected   = [3, 2, 1];
        $collection = new Collection($seedArray);
        $reversed   = $collection->reverse();

        $this->assertEquals($reversed->arrayResult(),      $expected);
        $this->assertEquals($reversed->jsonResult(),       json_encode($reversed));
    }

    /**
     * Tests the sum method on the collection
     *
     * @return void
     */
    public function testCollectionSum()
    {
        $seedArray = [1, 1, 1];
        $expected  = 3;
        $collection = new Collection($seedArray);
        $sum        = $collection->sumResult();

        $this->assertEquals($sum, $expected);
    }

    /**
     * Tests the unshift method on the collection
     *
     * @return void
     */
    public function testCollectionUnShift()
    {
        $seedArray = [];
        $expected  = [1];
        $collection = new Collection($seedArray);

        $this->assertEquals($collection->arrayResult(), []);

        $collection->unshift(1);

        $this->assertEquals($collection->arrayResult(), $expected);
    }
}