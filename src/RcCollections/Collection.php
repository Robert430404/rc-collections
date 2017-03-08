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
     * Performs a array column on the data, and then returns the collection for further
     * manipulation of the data by the user.
     *
     * Returns the values from a single column in the input array based up on the key of the
     * nested associative array
     *
     * @param $column
     * @param $key
     * @return Collection
     */
    public function column($column, $key = null): Collection
    {
        $this->data = array_column($this->data, $column, $key);

        return $this;
    }

    /**
     * Performs a array combine on the data, and then returns the collection for further
     * manipulation of the data by the user.
     *
     * This method makes use of the array combine to merge two structures, but it also gives
     * you a switch so you can either merge the new data as keys or values.
     *
     * @param array $data
     * @param bool $values
     * @return Collection
     */
    public function combine(array $data, bool $values = true): Collection
    {
        $combined = array_combine($this->data, $data);

        if (!$values) {
            $combined = array_combine($data, $this->data);
        }

        $this->data = $combined;

        return $this;
    }

    /**
     * Performs a array count values on the data, and then returns the collection for further
     * manipulation of the data by the user.
     *
     * Counts the occurrence of a specific value inside of an array and then returns an array
     * using the value as a key and the number of occurrences as the value.
     *
     * @return Collection
     */
    public function countValueOccurrence(): Collection
    {
        $this->data = array_count_values($this->data);

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