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
 * Provides functionality to retrieve meta data from a Microsoft SQL Server database.
 *
 * @package    DbUnit
 * @author     Nils Adermann <naderman@naderman.de>
 * @copyright  Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 1.1.0
 */
class PHPUnit_Extensions_Database_DB_MetaData_SqlSrv extends PHPUnit_Extensions_Database_DB_MetaData
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
     * Returns an array containing the names of all the tables in the database.
     *
     * @return array
     */
    public function getTableNames()
    {
        $query = "SELECT name
                    FROM sysobjects
                   WHERE type='U'";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $tableNames = array();
        while (($tableName = $statement->fetchColumn(0))) {
            $tableNames[] = $tableName;
        }

        return $tableNames;
    }

    /**
     * Returns an array containing the names of all the columns in the
     * $tableName table.
     *
     * @param string $tableName
     * @return array
     */
    public function getTableColumns($tableName)
    {
        $query = "SELECT c.name
                    FROM syscolumns c
               LEFT JOIN sysobjects o ON c.id = o.id
                   WHERE o.name = '$tableName'";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $columnNames = array();
        while (($columnName = $statement->fetchColumn(0))) {
            $columnNames[] = $columnName;
        }

        return $columnNames;
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
        $query     = "EXEC sp_statistics '$tableName'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $columnNames = array();
        while (($column = $statement->fetch())) {
            if ($column['TYPE'] == 1) {
                $columnNames[] = $column['COLUMN_NAME'];
            }
        }

        return $columnNames;
    }

    /**
    * Allow overwriting identities for the given table.
    *
    * @param string $tableName
    */
    public function disablePrimaryKeys($tableName)
    {
        try {
            $query = "SET IDENTITY_INSERT $tableName ON";
            $this->pdo->exec($query);
        }
        catch (PDOException $e) {
            // ignore the error here - can happen if primary key is not an identity
        }
    }

    /**
    * Reenable auto creation of identities for the given table.
    *
    * @param string $tableName
    */
    public function enablePrimaryKeys($tableName)
    {
        try {
            $query = "SET IDENTITY_INSERT $tableName OFF";
            $this->pdo->exec($query);
        }
        catch (PDOException $e) {
            // ignore the error here - can happen if primary key is not an identity
        }
    }
}
