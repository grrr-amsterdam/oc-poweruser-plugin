<?php
namespace GrrrAmsterdam\PowerUser\Traits;

use GrrrAmsterdam\PowerUser\Classes\Database\QueryBuilder;

trait Rememberable {

    /**
     * Get a new query builder instance for the connection.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        $builder = new QueryBuilder($conn, $grammar, $conn->getPostProcessor());

        if ($this->duplicateCache) {
            $builder->enableDuplicateCache();
        }
        if (isset($this->rememberFor)) {
            $builder->remember($this->rememberFor);
        }
        if (isset($this->rememberCacheTag)) {
            $builder->cacheTags($this->rememberCacheTag);
        }
        if (isset($this->rememberCachePrefix)) {
            $builder->prefix($this->rememberCachePrefix);
        }
        if (isset($this->rememberCacheDriver)) {
            $builder->cacheDriver($this->rememberCacheDriver);
        }

        return $builder;
    }

}
