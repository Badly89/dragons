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
 * Creates CsvDataSets based off of a spec string.
 *
 * The format of the spec string is as follows:
 *
 * <csv options>|table1:filename.csv,table2:filename2.csv
 *
 * The first portion of the spec including the pipe symbol '|' is optional.
 * If the pipe option is included than it may be preceded by up to four
 * characters specifying values for the following arguments in order:
 * delimiter (defaults to ',',) enclosure (defaults to '"',) escape (defaults to '"',).
 *
 * Any additional characters in the csv options will be discarded.
 *
 * @package    DbUnit
 * @author     Mike Lively <m@digitalsandwich.com>
 * @copyright  2010-2014 Mike Lively <m@digitalsandwich.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://www.phpunit.de/
 * @since      Class available since Release 1.0.0
 */
class PHPUnit_Extensions_Database_DataSet_Specs_Csv implements PHPUnit_Extensions_Database_DataSet_ISpec
{
    /**
     * Creates CSV Data Set from a data set spec.
     *
     * @param string $dataSetSpec
     * @return PHPUnit_Extensions_Database_DataSet_CsvDataSet
     */
    public function getDataSet($dataSetSpec)
    {
        $csvDataSetArgs = $this->getCsvOptions($dataSetSpec);
        $csvDataSetRfl  = new ReflectionClass('PHPUnit_Extensions_Database_DataSet_CsvDataSet');
        $csvDataSet     = $csvDataSetRfl->newInstanceArgs($csvDataSetArgs);

        foreach ($this->getTableFileMap($dataSetSpec) as $tableName => $file) {
            $csvDataSet->addTable($tableName, $file);
        }

        return $csvDataSet;
    }

    /**
     * Returns CSV options.
     *
     * Returns an array containing the options that will be passed to the
     * PHPUnit_Extensions_Database_DataSet_CsvDataSet constructor. The options
     * are determined by the given $dataSetSpec.
     *
     * @param string $dataSetSpec
     * @return array
     */
    protected function getCsvOptions($dataSetSpec)
    {
        list($csvOptStr, ) = explode('|', $dataSetSpec, 2);
        return str_split($csvOptStr);
    }

    /**
     * Returns map of tables to files.
     *
     * Returns an associative array containing a mapping of tables (the key)
     * to files (the values.) The tables and files are determined by the given
     * $dataSetSpec
     *
     * @param string $dataSetSpec
     * @return array
     */
    protected function getTableFileMap($dataSetSpec)
    {
        $tables = array();

        foreach (explode(',', $dataSetSpec) as $csvfile) {
            list($tableName, $file) = explode(':', $csvfile, 2);
            $tables[$tableName]     = $file;
        }

        return $tables;
    }
}
