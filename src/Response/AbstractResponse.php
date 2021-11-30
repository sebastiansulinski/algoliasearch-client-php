<?php

namespace Algolia\AlgoliaSearch\Response;

abstract class AbstractResponse implements \ArrayAccess
{
    /**
     * @var array Full response from Algolia API
     */
    protected $apiResponse;

    abstract public function wait($requestOptions = []);

    /**
     * @return array The actual response from Algolia API
     */
    public function getBody()
    {
        return $this->apiResponse;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset): bool
    {
        return isset($this->apiResponse[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset): mixed
    {
        return $this->apiResponse[$offset];
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value): void
    {
        $this->apiResponse[$offset] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset): void
    {
        unset($this->apiResponse[$offset]);
    }
}
