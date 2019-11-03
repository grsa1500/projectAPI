<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, DELETE, PUT");

//Including classes and database connection
include("includes/database.php");
include("includes/courses.class.php");
include("includes/jobs.class.php");
include("includes/project.class.php");


$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);

// Testing if Courses, Jobs or Projects are asked for


    switch($request[0]) {
        case "courses":
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
        $course->updateCourse( $input['name'],$input['school'], $input['points'], $input['program'], $input['startyear'], $input['endyear'], $input['id']);
            break;
        
        
        
            case "POST";
          //Code for POST   
          $course->addCourse( $input['name'],$input['school'], $input['points'], $input['program'], $input['startyear'],  $input['endyear']);
        
            break;
        
        
        //Code for DELETE
            case "DELETE";
        
        if(isset($request[1])) {
            $id = $request[1];
        }
        $course->deleteCourse($id);
        
            break;
        
        }
        
        $courseArray = []; 
        
        if($method != "GET") {
        
            $courseList = $course->getCourse(); 
              //Loading list when not GET
            foreach($projectList as $row) {
                $newarr['id'] = $row['id'];
                $newarr['name'] = $row['name'];
                $newarr['school'] = $row['school'];
                $newarr['program'] = $row['program'];
                $newarr['endyear'] = $row['endyear'];
                $newarr['startyear'] = $row['startyear'];
                $newarr['points'] = $row['points'];
                array_push($courseArray,$newarr);
            }
            echo json_encode($courseArray);
        }


        break;
        case "jobs":
        $job = new Job(); 

        if(isset($request[1])) {
            $id = $request[1];
        }
        
        switch($method) {
            case "GET":
        
            if(isset($id)) {
            
                $response = $job->getOneJob($id);
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        
            else {
            
            $response = $job->getJob();
            echo json_encode($response, JSON_PRETTY_PRINT);
            break;
        }
        
            case "PUT";
        //Code for PUT
        $job->updateJob( $input['title'],$input['place'],   $input['startyear'], $input['endyear'], $input['id']);
            break;
        
        
        
            case "POST";
          //Code for POST   
          $job->addJob( $input['title'],$input['place'], $input['startyear'], $input['endyear']);
        
            break;
        
        
        //Code for DELETE
            case "DELETE";
        
        if(isset($request[1])) {
            $id = $request[1];
        }
        $job->deleteJob($id);
        
            break;
        
        }
        
        $jobsArray = []; 
        
        if($method != "GET") {
        
            $jobsList = $job->getJob(); 
              //Loading list when not GET
            foreach($jobsList as $row) {
                $newarr['id'] = $row['id'];
                $newarr['place'] = $row['place'];
                $newarr['title'] = $row['title'];
                $newarr['endyear'] = $row['endyear'];
                $newarr['startyear'] = $row['startyear'];
                array_push($jobsArray,$newarr);
            }
            echo json_encode($jobsArray);
        }
        
        break;

        case "projects":
        $project = new Project(); 

        if(isset($request[1])) {
            $id = $request[1];
        }
        
        switch($method) {
            case "GET":
        
            if(isset($id)) {
            
                $response = $project->getOneProject($id);
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        
            else {
            
            $response = $project->getProject();
            echo json_encode($response, JSON_PRETTY_PRINT);
            break;
        }
        
            case "PUT";
        //Code for PUT
        $project->updateProject( $input['title'],$input['description'], $input['url'], $input['img'], $input['imgmobile'], $input['keywords'], $input['id']);
            break;
        
        
        
            case "POST";
          //Code for POST   
          $project->addProject( $input['title'],$input['description'], $input['urlweb'], $input['img'], $input['imgmobile'], $input['keywords']);
        
            break;
        
        
        //Code for DELETE
            case "DELETE";
        
        if(isset($request[1])) {
            $id = $request[1];
        }
        $project->deleteProject($id);
        
            break;
        
        }
        
        $projectArray = []; 
        
        //Loading list when not GET
        if($method != "GET") {
        
            $projectList = $project->getProject(); 
        
            foreach($projectList as $row) {
                $newarr['id'] = $row['id'];
                $newarr['title'] = $row['title'];
                $newarr['description'] = $row['description'];
                $newarr['urlweb'] = $row['url'];
                $newarr['keywords'] = $row['keywords'];
                $newarr['img'] = $row['img'];
                $newarr['imgmobile'] = $row['imgmobile'];
                array_push($projectArray,$newarr);
            }
            echo json_encode($projectArray);
        }

        break;
    }



if ($request[0] != "courses" || "jobs" || "projects") {
	http_response_code(404);
	exit();
}



