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
 * Provides the functionality to represent a database table.
 *
 * @package    DbUnit
 * @author     Mike Lively <m@digitalsandwich.com>
 * @copyright  2010-2014 Mike Lively <m@digitalsandwich.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 1.0.0
 */
class PHPUnit_Extensions_Database_DB_Table extends PHPUnit_Extensions_Database_DataSet_AbstractTable
{

    /**
     * Creates a new database table object.
     *
     * @param PHPUnit_Extensions_Database_DataSet_ITableMetaData $tableMetaData
     * @param PHPUnit_Extensions_Database_DB_IDatabaseConnection $databaseConnection
     */
    public function __construct(PHPUnit_Extensions_Database_DataSet_ITableMetaData $tableMetaData, PHPUnit_Extensions_Database_DB_IDatabaseConnection $databaseConnection)
    {
        $this->setTableMetaData($tableMetaData);

        $pdoStatement = $databaseConnection->getConnection()->prepare(PHPUnit_Extensions_Database_DB_DataSet::buildTableSelect($tableMetaData, $databaseConnection));
        $pdoStatement->execute();
        $this->data = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
    }
}
