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
 * Provides functionality to retrieve meta data from an Oracle database.
 *
 * @package    DbUnit
 * @author     Trond Hansen <trond@xait.no>
 * @copyright  Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 3.2.3
 */
class PHPUnit_Extensions_Database_DB_MetaData_Oci extends PHPUnit_Extensions_Database_DB_MetaData
{
    /**
     * No character used to quote schema objects.
     * @var string
     */
    protected $schemaObjectQuoteChar = '';

    /**
     * The command used to perform a TRUNCATE operation.
     * @var string
     */
    protected $truncateCommand = 'TRUNCATE TABLE';

    /**
     * @var array
     */
    protected $columns = array();

    /**
     * @var array
     */
    protected $keys = array();

    /**
     * Returns an array containing the names of all the tables in the database.
     *
     * @return array
     */
    public function getTableNames()
    {
        $tableNames = array();

        $query = "SELECT table_name
                    FROM cat
                   WHERE table_type='TABLE'
                   ORDER BY table_name";

        $result = $this->pdo->query($query);

        while ($tableName = $result->fetchColumn(0)) {
            $tableNames[] = $tableName;
        }

        return $tableNames;
    }

    /**
     * Returns an array containing the names of all the columns in the
     * $tableName table,
     *
     * @param string $tableName
     * @return array
     */
    public function getTableColumns($tableName)
    {
        if (!isset($this->columns[$tableName])) {
            $this->loadColumnInfo($tableName);
        }

        return $this->columns[$tableName];
   }

    /**
     * Returns an array containing the names of all the primary key columns in
     * the $tableName table.
     *
     * @param string $tableName
     * @return array
     */
    public function getTablePrimaryKeys($tableName)
    {
        if (!isset($this->keys[$tableName])) {
            $this->loadColumnInfo($tableName);
        }

        return $this->keys[$tableName];
    }

    /**
     * Loads column info from a oracle database.
     *
     * @param string $tableName
     */
    protected function loadColumnInfo($tableName)
    {
        $ownerQuery    = '';
        $conOwnerQuery = '';
        $tableParts    = $this->splitTableName($tableName);

        $this->columns[$tableName] = array();
        $this->keys[$tableName]    = array();

        if (!empty($tableParts['schema']))
        {
            $ownerQuery    = " AND OWNER = '{$tableParts['schema']}'";
            $conOwnerQuery = " AND a.owner = '{$tableParts['schema']}'";
        }

        $query = "SELECT DISTINCT COLUMN_NAME
                    FROM USER_TAB_COLUMNS
                   WHERE TABLE_NAME='".$tableParts['table']."'
                    $ownerQuery
                   ORDER BY COLUMN_NAME";

        $result = $this->pdo->query($query);

        while ($columnName = $result->fetchColumn(0)) {
            $this->columns[$tableName][] = $columnName;
        }

        $keyQuery = "SELECT b.column_name
                       FROM user_constraints a, user_cons_columns b
                      WHERE a.constraint_type='P'
                        AND a.constraint_name=b.constraint_name
                        $conOwnerQuery
                        AND a.table_name = '".$tableParts['table']."' ";

        $result = $this->pdo->query($keyQuery);

        while ($columnName = $result->fetchColumn(0)) {
            $this->keys[$tableName][] = $columnName;
        }
    }
}
