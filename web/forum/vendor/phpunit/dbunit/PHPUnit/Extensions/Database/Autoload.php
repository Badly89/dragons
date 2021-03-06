<?php
/*
 * This file is part of DBUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

spl_autoload_register(
  function ($class)
  {
      static $classes = NULL;
      static $path = NULL;

      if ($classes === NULL) {
          $classes = array(
            'phpunit_extensions_database_abstracttester' => '/Extensions/Database/AbstractTester.php',
            'phpunit_extensions_database_constraint_datasetisequal' => '/Extensions/Database/Constraint/DataSetIsEqual.php',
            'phpunit_extensions_database_constraint_tableisequal' => '/Extensions/Database/Constraint/TableIsEqual.php',
            'phpunit_extensions_database_constraint_tablerowcount' => '/Extensions/Database/Constraint/TableRowCount.php',
            'phpunit_extensions_database_dataset_abstractdataset' => '/Extensions/Database/DataSet/AbstractDataSet.php',
            'phpunit_extensions_database_dataset_abstracttable' => '/Extensions/Database/DataSet/AbstractTable.php',
            'phpunit_extensions_database_dataset_abstracttablemetadata' => '/Extensions/Database/DataSet/AbstractTableMetaData.php',
            'phpunit_extensions_database_dataset_abstractxmldataset' => '/Extensions/Database/DataSet/AbstractXmlDataSet.php',
            'phpunit_extensions_database_dataset_compositedataset' => '/Extensions/Database/DataSet/CompositeDataSet.php',
            'phpunit_extensions_database_dataset_csvdataset' => '/Extensions/Database/DataSet/CsvDataSet.php',
            'phpunit_extensions_database_dataset_datasetfilter' => '/Extensions/Database/DataSet/DataSetFilter.php',
            'phpunit_extensions_database_dataset_defaultdataset' => '/Extensions/Database/DataSet/DefaultDataSet.php',
            'phpunit_extensions_database_dataset_defaulttable' => '/Extensions/Database/DataSet/DefaultTable.php',
            'phpunit_extensions_database_dataset_defaulttableiterator' => '/Extensions/Database/DataSet/DefaultTableIterator.php',
            'phpunit_extensions_database_dataset_defaulttablemetadata' => '/Extensions/Database/DataSet/DefaultTableMetaData.php',
            'phpunit_extensions_database_dataset_flatxmldataset' => '/Extensions/Database/DataSet/FlatXmlDataSet.php',
            'phpunit_extensions_database_dataset_idataset' => '/Extensions/Database/DataSet/IDataSet.php',
            'phpunit_extensions_database_dataset_ipersistable' => '/Extensions/Database/DataSet/IPersistable.php',
            'phpunit_extensions_database_dataset_ispec' => '/Extensions/Database/DataSet/ISpec.php',
            'phpunit_extensions_database_dataset_itable' => '/Extensions/Database/DataSet/ITable.php',
            'phpunit_extensions_database_dataset_itableiterator' => '/Extensions/Database/DataSet/ITableIterator.php',
            'phpunit_extensions_database_dataset_itablemetadata' => '/Extensions/Database/DataSet/ITableMetaData.php',
            'phpunit_extensions_database_dataset_iyamlparser' => '/Extensions/Database/DataSet/IYamlParser.php',
            'phpunit_extensions_database_dataset_mysqlxmldataset' => '/Extensions/Database/DataSet/MysqlXmlDataSet.php',
            'phpunit_extensions_database_dataset_persistors_abstract' => '/Extensions/Database/DataSet/Persistors/Abstract.php',
            'phpunit_extensions_database_dataset_persistors_factory' => '/Extensions/Database/DataSet/Persistors/Factory.php',
            'phpunit_extensions_database_dataset_persistors_flatxml' => '/Extensions/Database/DataSet/Persistors/FlatXml.php',
            'phpunit_extensions_database_dataset_persistors_mysqlxml' => '/Extensions/Database/DataSet/Persistors/MysqlXml.php',
            'phpunit_extensions_database_dataset_persistors_xml' => '/Extensions/Database/DataSet/Persistors/Xml.php',
            'phpunit_extensions_database_dataset_persistors_yaml' => '/Extensions/Database/DataSet/Persistors/Yaml.php',
            'phpunit_extensions_database_dataset_querydataset' => '/Extensions/Database/DataSet/QueryDataSet.php',
            'phpunit_extensions_database_dataset_querytable' => '/Extensions/Database/DataSet/QueryTable.php',
            'phpunit_extensions_database_dataset_replacementdataset' => '/Extensions/Database/DataSet/ReplacementDataSet.php',
            'phpunit_extensions_database_dataset_replacementtable' => '/Extensions/Database/DataSet/ReplacementTable.php',
            'phpunit_extensions_database_dataset_replacementtableiterator' => '/Extensions/Database/DataSet/ReplacementTableIterator.php',
            'phpunit_extensions_database_dataset_specs_csv' => '/Extensions/Database/DataSet/Specs/Csv.php',
            'phpunit_extensions_database_dataset_specs_dbquery' => '/Extensions/Database/DataSet/Specs/DbQuery.php',
            'phpunit_extensions_database_dataset_specs_dbtable' => '/Extensions/Database/DataSet/Specs/DbTable.php',
            'phpunit_extensions_database_dataset_specs_factory' => '/Extensions/Database/DataSet/Specs/Factory.php',
            'phpunit_extensions_database_dataset_specs_flatxml' => '/Extensions/Database/DataSet/Specs/FlatXml.php',
            'phpunit_extensions_database_dataset_specs_ifactory' => '/Extensions/Database/DataSet/Specs/IFactory.php',
            'phpunit_extensions_database_dataset_specs_xml' => '/Extensions/Database/DataSet/Specs/Xml.php',
            'phpunit_extensions_database_dataset_specs_yaml' => '/Extensions/Database/DataSet/Specs/Yaml.php',
            'phpunit_extensions_database_dataset_symfonyyamlparser' => '/Extensions/Database/DataSet/SymfonyYamlParser.php',
            'phpunit_extensions_database_dataset_tablefilter' => '/Extensions/Database/DataSet/TableFilter.php',
            'phpunit_extensions_database_dataset_tablemetadatafilter' => '/Extensions/Database/DataSet/TableMetaDataFilter.php',
            'phpunit_extensions_database_dataset_xmldataset' => '/Extensions/Database/DataSet/XmlDataSet.php',
            'phpunit_extensions_database_dataset_yamldataset' => '/Extensions/Database/DataSet/YamlDataSet.php',
            'phpunit_extensions_database_db_dataset' => '/Extensions/Database/DB/DataSet.php',
            'phpunit_extensions_database_db_defaultdatabaseconnection' => '/Extensions/Database/DB/DefaultDatabaseConnection.php',
            'phpunit_extensions_database_db_filtereddataset' => '/Extensions/Database/DB/FilteredDataSet.php',
            'phpunit_extensions_database_db_idatabaseconnection' => '/Extensions/Database/DB/IDatabaseConnection.php',
            'phpunit_extensions_database_db_imetadata' => '/Extensions/Database/DB/IMetaData.php',
            'phpunit_extensions_database_db_metadata' => '/Extensions/Database/DB/MetaData.php',
            'phpunit_extensions_database_db_metadata_firebird' => '/Extensions/Database/DB/MetaData/Firebird.php',
            'phpunit_extensions_database_db_metadata_informationschema' => '/Extensions/Database/DB/MetaData/InformationSchema.php',
            'phpunit_extensions_database_db_metadata_mysql' => '/Extensions/Database/DB/MetaData/MySQL.php',
            'phpunit_extensions_database_db_metadata_oci' => '/Extensions/Database/DB/MetaData/Oci.php',
            'phpunit_extensions_database_db_metadata_pgsql' => '/Extensions/Database/DB/MetaData/PgSQL.php',
            'phpunit_extensions_database_db_metadata_sqlite' => '/Extensions/Database/DB/MetaData/Sqlite.php',
            'phpunit_extensions_database_db_metadata_sqlsrv' => '/Extensions/Database/DB/MetaData/SqlSrv.php',
            'phpunit_extensions_database_db_metadata_dblib' => '/Extensions/Database/DB/MetaData/Dblib.php',
            'phpunit_extensions_database_db_resultsettable' => '/Extensions/Database/DB/ResultSetTable.php',
            'phpunit_extensions_database_db_table' => '/Extensions/Database/DB/Table.php',
            'phpunit_extensions_database_db_tableiterator' => '/Extensions/Database/DB/TableIterator.php',
            'phpunit_extensions_database_db_tablemetadata' => '/Extensions/Database/DB/TableMetaData.php',
            'phpunit_extensions_database_defaulttester' => '/Extensions/Database/DefaultTester.php',
            'phpunit_extensions_database_exception' => '/Extensions/Database/Exception.php',
            'phpunit_extensions_database_idatabaselistconsumer' => '/Extensions/Database/IDatabaseListConsumer.php',
            'phpunit_extensions_database_itester' => '/Extensions/Database/ITester.php',
            'phpunit_extensions_database_operation_composite' => '/Extensions/Database/Operation/Composite.php',
            'phpunit_extensions_database_operation_delete' => '/Extensions/Database/Operation/Delete.php',
            'phpunit_extensions_database_operation_deleteall' => '/Extensions/Database/Operation/DeleteAll.php',
            'phpunit_extensions_database_operation_exception' => '/Extensions/Database/Operation/Exception.php',
            'phpunit_extensions_database_operation_factory' => '/Extensions/Database/Operation/Factory.php',
            'phpunit_extensions_database_operation_idatabaseoperation' => '/Extensions/Database/Operation/IDatabaseOperation.php',
            'phpunit_extensions_database_operation_insert' => '/Extensions/Database/Operation/Insert.php',
            'phpunit_extensions_database_operation_null' => '/Extensions/Database/Operation/Null.php',
            'phpunit_extensions_database_operation_replace' => '/Extensions/Database/Operation/Replace.php',
            'phpunit_extensions_database_operation_rowbased' => '/Extensions/Database/Operation/RowBased.php',
            'phpunit_extensions_database_operation_truncate' => '/Extensions/Database/Operation/Truncate.php',
            'phpunit_extensions_database_operation_update' => '/Extensions/Database/Operation/Update.php',
            'phpunit_extensions_database_testcase' => '/Extensions/Database/TestCase.php',
            'phpunit_extensions_database_ui_command' => '/Extensions/Database/UI/Command.php',
            'phpunit_extensions_database_ui_context' => '/Extensions/Database/UI/Context.php',
            'phpunit_extensions_database_ui_imedium' => '/Extensions/Database/UI/IMedium.php',
            'phpunit_extensions_database_ui_imediumprinter' => '/Extensions/Database/UI/IMediumPrinter.php',
            'phpunit_extensions_database_ui_imode' => '/Extensions/Database/UI/IMode.php',
            'phpunit_extensions_database_ui_imodefactory' => '/Extensions/Database/UI/IModeFactory.php',
            'phpunit_extensions_database_ui_invalidmodeexception' => '/Extensions/Database/UI/InvalidModeException.php',
            'phpunit_extensions_database_ui_mediums_text' => '/Extensions/Database/UI/Mediums/Text.php',
            'phpunit_extensions_database_ui_modefactory' => '/Extensions/Database/UI/ModeFactory.php',
            'phpunit_extensions_database_ui_modes_exportdataset' => '/Extensions/Database/UI/Modes/ExportDataSet.php',
            'phpunit_extensions_database_ui_modes_exportdataset_arguments' => '/Extensions/Database/UI/Modes/ExportDataSet/Arguments.php'
          );

          $path = dirname(dirname(dirname(__FILE__)));
      }

      $cn = strtolower($class);

      if (isset($classes[$cn])) {
          $file = $path . $classes[$cn];

          require $file;
      }
  }
);
