<?php
class MonthlyCommand extends CConsoleCommand
{
    public function run($args)
	{
        $sql = "CALL sp_cron_monthly_01()";
		$this->db->query($sql)->result();
    }
}