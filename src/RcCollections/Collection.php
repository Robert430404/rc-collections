<?php

namespace RcCollections;

use JsonSerializable;
use Serializable;

/**
 * Class Collection
 *
 * @package RcCollections
 */
class Collection implements JsonSerializable, Serializable
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
     * array keys.
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
     * This method makes use of the array combine to combine two structures, using one
     * as a key set and the other as a value set, into a single array. You have a switch
     * available to you so you can either merge the new data as keys or values.
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
     * Performs a merge on the data, and then returns the collection for further manipulation
     * of the data by the user.
     *
     * This method makes use of the array merge to merge two structures into a single array.
     * There is also a switch available so you can set which array is first in the new array.
     *
     * @param array $data
     * @param bool $first
     * @return Collection
     */
    public function merge(array $data, bool $first = true): Collection
    {
        $merged = array_merge($data, $this->data);

        if (!$first) {
            $merged = array_merge($this->data, $data);
        }

        $this->data = $merged;

        return $this;
    }

    /**
     * Pops the last value off of the array and sets it as the working set, and then returns
     * the collection for further manipulation.
     *
     * @return $this
     */
    public function pop(): Collection
    {
        $this->data = array_pop($this->data);

        return $this;
    }

    /**
     * Pushes a new value into the working set and then returns the collection for further
     * manipulation.
     *
     * @param $value
     * @return $this
     */
    public function push($value): Collection
    {
        array_push($this->data, $value);

        return $this;
    }

    /**
     * Reverses the core data, and sets it as the working set. It then returns the
     * collection for further manipulation.
     *
     * @return Collection
     */
    public function reverse(): Collection
    {
        $this->data = array_reverse($this->data);

        return $this;
    }

    /**
     * Shifts an item off of the beginning of the data, and sets it as the working set. It
     * then returns the collection for further manipulation.
     *
     * @return Collection
     */
    public function shift(): Collection
    {
        array_shift($this->data);

        return $this;
    }

    /**
     * Performs an array_slice on the data set, sets it as the working set. It then returns the
     * collection for further manipulation.
     *
     * @param int $offset
     * @param int|null $length
     * @param bool $preserveKeys
     * @return Collection
     */
    public function slice(int $offset, int $length = null, bool $preserveKeys = false): Collection
    {
        $this->data = array_slice($this->data, $offset, $length, $preserveKeys);

        return $this;
    }

    /**
     * UnShifts an item on to the beginning of the data, and sets it as the working set. It
     * then returns the collection for further manipulation.
     *
     * @return Collection
     */
    public function unshift($value): Collection
    {
        array_unshift($this->data, $value);

        return $this;
    }

    /**
     * Performs a walk on the data, and then returns the collection for further manipulation
     * of the data by the user.
     *
     * The array walk applies all of the mutations you have in your handler to the value of the
     * array you are currently manipulating.
     *
     * @param callable $handle
     * @param null $userData
     * @return Collection
     */
    public function walk(Callable $handle, $userData = null): Collection
    {
        array_walk($this->data, $handle, $userData);

        return $this;
    }

    /**
     * Returns the sum of the array's values.
     *
     * @return float|int
     */
    public function sumResult()
    {
        return array_sum($this->data);
    }

    /**
     * Returns a random value from the array
     *
     * @return mixed
     */
    public function randResult()
    {
        $value = array_rand($this->data);

        return $this->data[$value];
    }

    /**
     * Returns the result of the operations that were done to the collection in an array.
     *
     * @return array
     */
    public function arrayResult(): array
    {
        return $this->data;
    }

    /**
     * Returns the result of the operations that were done to the collection in a json string.
     *
     * @return string
     */
    public function jsonResult(): string
    {
        return json_encode($this);
    }

    /**
     * Returns the result of the operations that were done to the collection in a serialized string.
     *
     * @return string
     */
    public function serializedResult(): string
    {
        return $this->serialize();
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by json_encode, which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize(): array
    {
        return $this->data;
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize():string
    {
        return serialize($this->data);
    }

    /**
     * Constructs the object
     *
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized
     * @return Collection
     * @since 5.1.0
     */
    public function unserialize($serialized): Collection
    {
        $this->data = unserialize($serialized);

        return $this;
    }
}