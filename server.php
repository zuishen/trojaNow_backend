<?php
	require_once './webAPI/IndexServer.php';
	require_once './DataModel/UserModel.php';
	require_once './Dao/dbConnect.php';
	require_once './Dao/dbManul.php';
	require_once './config.php';
	require_once './webAPI/BlogServer.php';
	require_once './DataModel/BlogModel.php';
	require_once './DataModel/CommentModel.php';
	require_once './webAPI/CommentServer.php';
	require_once './webAPI/MessageServer.php';
	require_once './DataModel/MessageModel.php';
	
	if(isset($_GET["res"]) && isset($_GET["action"])) {
	$res = $_GET["res"];
	$action = $_GET["action"];	
//	echo $res." ".$action;	//--------------test info
	
	switch ($res)
	{
		case "index": 	{$indexServer = new IndexServer($action); $indexServer->run();break;}
		case "blog": 	{$blogServer = new BlogServer($action); $blogServer->run(); break;}
		case "comment": {$commentServer = new CommentServer($action); $commentServer->run();break;}
		case "message": {$messageServer = new MessageServer($action); $messageServer->run(); break;}
		default: echo "invalid request";
	}
	}
	else  echo json_encode(array("status" => "false", 
								 "message" => "invalid get parameters",
	 							 "result" => ""));
	 