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
     * Performs a map on the data
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
     * Performs a filter on the data
     *
     * @param callable $handle
     * @return Collection
     */
    public function filter(Callable $handle): Collection
    {
        $this->data = array_filter($this->data, $handle, ARRAY_FILTER_USE_BOTH);

        return $this;
    }

    /**
     * Performs the key case change function on the data
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
     * Returns the result of the previous operations
     *
     * @return array
     */
    public function result(): array
    {
        return $this->data;
    }
}