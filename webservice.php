<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT");

//Including classes and database connection
include("includes/database.php");
include("includes/courses.class.php");


$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);



if ($request[0] != "courses") {
	http_response_code(404);
	exit();
}

$course = new Course(); 

if(isset($request[1])) {
	$id = $request[1];
}

switch($method) {
    case "GET":

    if(isset($id)) {
    
        $response = $course->getOneCourse($id);
        echo json_encode($response, JSON_PRETTY_PRINT);
    }

    else {
    
    $response = $course->getCourse();
    echo json_encode($response, JSON_PRETTY_PRINT);
    break;
}

    case "PUT";
//Code for PUT
$course->updateCourse( $input['code'],$input['name'], $input['progression'], $input['syllabus'], $input['id']);
    break;



    case "POST";
  //Code for POST   
  $course->addCourse( $input['code'],$input['name'], $input['progression'], $input['syllabus']);

    break;


//Code for DELETE
    case "DELETE";

if(isset($request[1])) {
	$id = $request[1];
}
$course->deleteCourse($id);

    break;

}

$coursesArray = []; 

if($method != "GET") {

	$courseList = $course->getCourse(); 

	foreach($courseList as $row) {
        $newarr['id'] = $row['id'];
        $newarr['name'] = $row['name'];
		$newarr['code'] = $row['code'];
		$newarr['progression'] = $row['progression'];
		$newarr['syllabus'] = $row['syllabus'];
		array_push($coursesArray,$newarr);
	}
    echo json_encode($coursesArray);
}

