<?php
Flight::route( 'POST /users/add', function(){
	$db = Flight::db();

	$username = $_POST['username'];
	$password = $_POST['password'];


	$data = array(
		'username' => $username,
		'password' => md5($password)
	);

	$id = $db->insert('users', $data);
	if ($id)
	  flight::redirect('users');
	else
	    echo 'insert failed: ' . $db->getLastError();
});

flight::route('/users/delete/@username' , function($username){
	$db = Flight::db();
	$db->where('username', $username);
	if($db->delete('users'))  flight::redirect('users');
});

Flight::route( 'POST /users/edit/@username', function($username){
	$db = Flight::db();

	$username_new = $_POST['username'];
	$password_new = $_POST['password'];
	
	$data = Array (
	'username' => $username_new,
	'password' => $password_new,
	// 'editCount' => $db->inc(2),
	// // editCount = editCount + 2;
	// 'active' => $db->not()
	// // active = !active;
	);

	$db->where ('username', $username);
	if ($db->update ('users', $data))
	    echo $db->count . ' records were updated';
	else
	    echo 'update failed: ' . $db->getLastError();
});

flight::route('/users/edit/@username' , function($username){
	Flight::view()->set('title','Users');

	Flight::render('edit-user',array(
		'username' => $username
		));
});

Flight::route( 'GET /users(/page/@page:[0-9]+)', function($page){
	Flight::view()->set('title', 'Users');

	if ( empty($page) ){
		$page = 1;
	}

	$db = Flight::db();
	$db->pageLimit = 10; // set limit per page

	$users = $db->arraybuilder()->paginate('users', $page);
    Flight::render( 'users', array(
    	'users' => $users,
    	'page' => $page,
    	'total_pages' => $db->totalPages
    ) );
});