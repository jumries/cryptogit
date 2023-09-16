<?php
include("Func.php");
$transferfunc = new Func();
if (isset($_POST['insertdata']) && $_POST['insertdata'] == 'insertdata') {


	// unset($_POST['insertdata']);
// $transferfunc->insertData('submitsignal',$_POST);
	$check = $transferfunc->table('submitsignal')->insert([
		'name'		=> $_POST['name'],
		'buy'		=> $_POST['buy'],
		'target' 	=> $_POST['target'],
		'stop'		=> $_POST['stop'],
		'result'	=> $_POST['result'],
		'date'		=> date('Y-m-d')
	]);
		echo json_encode($check);
}

if (isset($_POST['up']) && $_POST['up'] == 'update' ) {
	
	$update = $transferfunc->table('submitsignal')
				->where('id',$_POST['id'])
				->update([
					'name'		=> $_POST['name'],
					'buy'		=> $_POST['buy'],
					'target' 	=> $_POST['target'],
					'stop'		=> $_POST['stop'],
					'result'	=> $_POST['result'],
					'date'		=> date('Y-m-d')
				]);
	echo $update;
}

if(isset($_GET['delete']) && $_GET['id'] != ''){
	$delete = $transferfunc->table('submitsignal')
				->where('id',$_GET['id'])
				->delete();
		echo $delete;
		header("location:board.php");
}

if (isset($_GET['datacollect']) && $_GET['datacollect'] == 'yes') {
	$data = $transferfunc->getData('submitsignal',$_GET['page']);
			echo json_encode($data);

}



?>