<?php
class DailyCommand extends CConsoleCommand
{
    public function run($args)
	{
        $sql = "CALL sp_cron_daily()";
		$this->db->query($sql)->result();
    }
}