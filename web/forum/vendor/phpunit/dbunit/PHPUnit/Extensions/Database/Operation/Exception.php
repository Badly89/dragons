<?php
/*
 * This file is part of DBUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Thrown for exceptions encountered with database operations. Provides
 * information regarding which operations failed and the query (if any) it
 * failed on.
 *
 * @package    DbUnit
 * @author     Mike Lively <m@digitalsandwich.com>
 * @copyright  2010-2014 Mike Lively <m@digitalsandwich.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 1.0.0
 */
class PHPUnit_Extensions_Database_Operation_Exception extends RuntimeException
{

    /**
     * @var string
     */
    protected $operation;

    /**
     * @var string
     */
    protected $preparedQuery;

    /**
     * @var array
     */
    protected $preparedArgs;

    /**
     * @var PHPUnit_Extensions_Database_DataSet_ITable
     */
    protected $table;

    /**
     * @var string
     */
    protected $error;

    /**
     * Creates a new dbunit operation exception
     *
     * @param string $operation
     * @param string $current_query
     * @param PHPUnit_Extensions_Database_DataSet_ITable $current_table
     * @param string $error
     */
    public function __construct($operation, $current_query, $current_args, $current_table, $error)
    {
        parent::__construct("{$operation} operation failed on query: {$current_query} using args: " . print_r($current_args, TRUE) . " [{$error}]");

        $this->operation     = $operation;
        $this->preparedQuery = $current_query;
        $this->preparedArgs  = $current_args;
        $this->table         = $current_table;
        $this->error         = $error;
    }

    public function getOperation()
    {
        return $this->operation;
    }

    public function getQuery()
    {
        return $this->preparedQuery;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getArgs()
    {
        return $this->preparedArgs;
    }

    public function getError()
    {
        return $this->error;
    }
}
