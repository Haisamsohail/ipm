<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
// use Jfelder\OracleDB\OCI_PDO;

class Connection extends Model
{
	public $intranet;
	// public $ilassnap;
	// public $mailsys;
	

	public function __construct()
	{
		parent::__construct();
		$this->intranet = DB::connection('mysql');
		// $this->trrecruit = DB::connection('trrecruit');
		// $this->gbdweb = DB::connection('GBDWEB');
	}

	public static function customDatabaseConection($database)
	{
		return DB::connection($database);
	}
}