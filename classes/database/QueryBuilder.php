<?php
namespace GrrrAmsterdam\PowerUser\Classes\Database;

use App;
use October\Rain\Database\QueryBuilder as Builder;

class QueryBuilder extends Builder {

    /**
     * Update a record in the database.
     *
     * @param  array $values
     * @return int
     */
    public function update(array $values)
    {
        $this->flushCache();

        return parent::update($values);
    }

    /**
     * Delete a record from the database.
     *
     * @param  mixed $id
     * @return int
     */
    public function delete($id = null)
    {
        $this->flushCache();

        return parent::delete($id);
    }

    /**
     * Insert a new record and get the value of the primary key.
     *
     * @param  array   $values
     * @param  string  $sequence
     * @return int
     */
    public function insertGetId(array $values, $sequence = null)
    {
        $this->flushCache();

        return parent::insertGetId($values, $sequence);
    }

    /**
     * Insert a new record into the database.
     *
     * @param  array  $values
     * @return bool
     */
    public function insert(array $values)
    {
        $this->flushCache();

        return parent::insert($values);
    }

    /**
     * Run a truncate statement on the table.
     *
     * @return void
     */
    public function truncate()
    {
        $this->flushCache();

        parent::truncate();
    }

    public function flushCache() {
        App::make('cache')->flush();
    }
}
