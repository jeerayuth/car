<?php
	require("localization.php");
	require("database_firebird.php");
	require("database_mongodb.php");
	require("database_mssql.php");
	require("database_mysql.php");
	require("database_odbc.php");
	require("database_pg.php");
	require("database_oracle.php");
	require("database_xml.php");
	require("handler.php");


	$enable_compression = true;

	$report_key = sti_get_parameter_value("stimulsoft_report_key");
	$client_key = sti_get_parameter_value("stimulsoft_client_key");

	$client_data = null;
	if (isset($HTTP_RAW_POST_DATA)) $client_data = $HTTP_RAW_POST_DATA;
	if ($client_data == null) $client_data = file_get_contents("php://input");


	/**
	 *  Directory, which contains the localization XML files.
	 */
	function sti_get_localization_directory()
	{
		return "localization";
	}


	/**
	 *  Returns .mrt or .mdc file by string ID that was set when running.
	 *  If necessary, it is possible to change the code for getting a report by its ID from file or from database.
	 */
	function sti_get_report($report_key)
	{
		/*switch ($report_key)
		{
			case "report1": return file_get_contents("/reports/Report.mrt");
			case "report2": return file_get_contents("/reports/Document.mdc");
		}*/
		
		if (file_exists("../reports/$report_key")) return file_get_contents("../reports/$report_key");
		
		// If there is no need to load the report, then the empty string will be sent
		return "";
		
		// If you want to display an error message, please use the following format
		return "ServerError:Some text message";
	}


	/**
	 *  The code for saving a report can be placed in this function.
	 *  
	 *  Response to the client - report key and error code.
	 *  You can use the next error codes:
	 *     -1: the message box is not shown
	 *      0: shows the "Report is successfully saved" message
	 *  In other cases shows a window with the defined value
	 */
	function sti_save_report($report, $report_key, $new_report_flag)
	{
		// You can change the report key, if necessary
		//if ($new_report_flag == "True") $report_key = "MyReport.mrt";
		
		$error_code = "-1";
		if (file_put_contents("../reports/$report_key", $report) === false) $error_code = "Error when saving a report";
		
		return "<?xml version=\"1.0\" encoding=\"UTF-8\"?><SaveReport><ReportKey>$report_key</ReportKey><ErrorCode>$error_code</ErrorCode></SaveReport>";
	}


	/**
	 *  The function for changing values on parameters by their name in the SQL query.
	 *  Parameters can be set as {ParamName} in the SQL query.
	 *  By default values are taken according to the name of a parameter in the URL string or in the POST data.
	 */
	function sti_get_parameter($parameter_name, $default_value)
	{
		/*switch ($parameter_name)
		{
			case "ParameterName1": return "Value1";
			case "ParameterName2": return "Value2";
		}*/
		
		return $default_value;
	}


	/**
	 *  Getting the Connection String when requesting the client's Flash application to a database.
	 *  In this function you can change the Connection String of a report.
	 */
	function sti_get_connection_string($connection_type, $connection_string)
	{
		/*switch ($connection_type)
		{
			case "StiSqlDatabase": return "Data Source=SERVER\SQLEXPRESS;Initial Catalog=master;Integrated Security=True";
			case "StiMySqlDatabase": return "Server=localhost;Database=db_name;Port=3306;User=root;Password=;";
			case "StiOdbcDatabase": return "DSN=MS Access Database;DBQ=D:\NWIND.MDB;DefaultDir=D:;DriverId=281;FIL=MS Access;MaxBufferSize=2048;PageTimeout=5;UID=admin;";
			case "StiPostgreSQLDatabase": return "Server=localhost;Database=db_name;Port=5432;User=postgres;Password=postgres;";
			case "StiOracleDatabase": return "database=ORCL;user=SYSDBA;password=111;privilege=sysdba";
			case "StiFirebirdDatabase": return "server=localhost;database=/usr/local/firebird-2.1/data/test.fdb;user=SYSDBA;password=masterkey;";
		}*/
		
		return $connection_string;
	}


	/**
	 *  Saving an exported report.
	 *  Response to the client - error code. Standard codes:
	 *      -1: the message box is not shown
	 *       0: shows the "Report is successfully saved" message
	 *  In other cases shows a window with the defined value
	 */
	function sti_export_report($format, $report_key, $file_name, $data)
	{
		if (file_put_contents("../exports/$file_name", $data) === false) return "Error when saving an exported report";
		return "-1";
	}


	// Processing client Flash application commands
	if (isset($client_key))
	{
		if (!function_exists("gzuncompress")) $enable_compression = false;
		
		if ($enable_compression && strlen($client_data) > 0)
		{
			$client_data = base64_decode($client_data);
			$client_data = gzuncompress($client_data);
		}
		
		$response = sti_client_event_handler($client_key, $report_key, $client_data, $enable_compression);
		
		if ($enable_compression && strlen($response) > 0 && $client_key != "ViewerFx" && $client_key != "DesignerFx")
		{
			$response = gzcompress($response);
			$response = base64_encode($response);
		}
		
		echo $response;
	}

?>