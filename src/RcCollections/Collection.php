<?php

namespace RcCollections;

/**
 * Class Collection
 *
 * @package RcCollections
 */
class Collection
{
    /**
     * @var array
     */
    private $data;

    /**
     * Collection constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Performs the key case change function on the data and, then returns the collection
     * for further manipulation of the data by the user.
     *
     * The array change key case function upper or lower cases all of the characters in your
     * array kets.
     *
     * @param int $case
     * @return Collection
     */
    public function changeKeyCase(int $case = CASE_LOWER): Collection
    {
        $this->data = array_change_key_case($this->data, $case);

        return $this;
    }

    /**
     * Performs a chunk on the data, and then returns the collection for further manipulation
     * of the data by the user.
     *
     * The array chunk function works by splitting the array values into two equal, or as close
     * as possible, size arrays.
     *
     * @param int $size
     * @param bool $preserveKeys
     * @return Collection
     */
    public function chunk(int $size, bool $preserveKeys = false): Collection
    {
        $this->data = array_chunk($this->data, $size, $preserveKeys);

        return $this;
    }

    /**
     * Performs a map on the data, and then returns the collection for further manipulation
     * of the data by the user.
     *
     * The array map applies all of the mutations you have in your handler to the value of the
     * array you are currently manipulating.
     *
     * @param callable $handle
     * @return Collection
     */
    public function map(Callable $handle): Collection
    {
        $this->data = array_map($handle, $this->data);

        return $this;
    }

    /**
     * Performs a filter on the data, and then returns the collection for further manipulation
     * of the data by the user.
     *
     * The array filter function works by filtering the array values based on the parameters you
     * have set in your handler function
     *
     * @param callable $handle
     * @param int $mode
     * @return Collection
     */
    public function filter(Callable $handle, int $mode = ARRAY_FILTER_USE_BOTH): Collection
    {
        $this->data = array_filter($this->data, $handle, $mode);

        return $this;
    }

    /**
     * Returns the result of the operations that were done to the collection.
     *
     * @return array
     */
    public function result(): array
    {
        return $this->data;
    }
}