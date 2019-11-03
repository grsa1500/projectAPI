<?php

class Course {
    private $db;

    function __construct() {
        // Connecting to database

        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    }

    //Get all Courses
    function getCourse() {

        $sql = "SELECT * FROM courses";
        $result = $this->db->query($sql);   
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get for specific course
    function getOneCourse($id) {

        $sql = "SELECT * FROM courses WHERE id='$id'";
        $result = $this->db->query($sql);   
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Adding courses
    function addCourse($name, $school, $points, $program, $startyear, $endyear) {
        $sql = "INSERT INTO courses (name, school, points, program,  startyear,  endyear) VALUES ('$name', '$school', '$points', '$program',  '$startyear',  '$endyear');";
        return $this->db->query($sql);
    }

    //Update course
    function updateCourse($name, $school, $points, $program, $startyear, $endyear, $id) {
        $sql = "UPDATE courses SET name = '$name',  school = '$school', points = '$points',  startyear = '$startyear',  endyear = '$endyear' WHERE id = '$id';";
        $result = $this->db->query($sql);
        return $result;  
    }


    //Delete course
    function deleteCourse($id) {
        
        $sql = "DELETE FROM courses WHERE id = $id;";
        $result = $this->db->query($sql);
        return $result;  
     
   
    }


}