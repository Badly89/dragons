<?php
/**
 * Provides functionality to retrieve meta data from an Dblib (SQL Server) database.
 *
 * @package    DbUnit
 * @author     Tom Ford <tom@switchsystems.co.uk>
 * @copyright  Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link       http://www.phpunit.de/
 */
class PHPUnit_Extensions_Database_DB_MetaData_Dblib extends PHPUnit_Extensions_Database_DB_MetaData
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

        $query = "SELECT name
                    FROM sys.tables
                   ORDER BY name";

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
     * Loads column info from a sql server database.
     *
     * @param string $tableName
     */
    protected function loadColumnInfo($tableName)
    {
        $query = "SELECT name
			FROM sys.columns
		   WHERE object_id = OBJECT_ID('".$tableName."')
		   ORDER BY column_id";

        $result = $this->pdo->query($query);

        while ($columnName = $result->fetchColumn(0)) {
            $this->columns[$tableName][] = $columnName;
        }

        $keyQuery = "SELECT COL_NAME(ic.OBJECT_ID,ic.column_id) AS ColumnName
			FROM    sys.indexes AS i INNER JOIN 
				sys.index_columns AS ic ON  i.OBJECT_ID = ic.OBJECT_ID
						        AND i.index_id = ic.index_id
			WHERE   i.is_primary_key = 1 AND OBJECT_NAME(ic.OBJECT_ID) = '".$tableName."'";

        $result = $this->pdo->query($keyQuery);

        while ($columnName = $result->fetchColumn(0)) {
            $this->keys[$tableName][] = $columnName;
        }
    }
}
