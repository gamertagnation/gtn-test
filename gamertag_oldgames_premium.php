<?php
/*======================================================================*\
|| #################################################################### ||
|| # Gamertag Nation												  # ||
|| # ---------------------------------------------------------------- # ||
|| # Copyright 2008 - 2013 Gamertag Nation.      All Rights Reserved. # ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- GAMERTAG NATION PROGRAMMING ------------------- # ||
|| #                 http://www.gamertagnation.com 		      		  # ||
|| #################################################################### ||
\*======================================================================*/

// ######################## SET PHP ENVIRONMENT ###########################
error_reporting(E_ALL & ~E_NOTICE);
if (!is_object($vbulletin->db))
{
	exit;
}

// ######################### REQUIRE BACK-END ############################
require_once(DIR . '/includes/functions_gamertag_cron.php');

// ########################################################################
// ######################### START MAIN SCRIPT ############################
// ########################################################################

$debugcode = false; // whether or not to record debug logs to database

$syncresult = sync_gamertag_games(3, $debugcode);

if ($syncresult['updatedcounter'])
{
	log_cron_action($syncresult['logmessage'], $nextitem);
}

if (VB_AREA == 'AdminCP' AND $syncresult['logmessage'])
{
	echo $syncresult['logmessage'] . "<br />";
}

?>