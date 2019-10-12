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
    function addCourse($code, $name, $progression, $syllabus) {
        $sql = "INSERT INTO courses (code, name, progression, syllabus) VALUES ('$code', '$name', '$progression', '$syllabus');";
        return $this->db->query($sql);
    }

    //Update course
    function updateCourse($code, $name, $progression, $syllabus, $id) {
        $sql = "UPDATE courses SET code = '$code',  name = '$name', progression = '$progression',  syllabus = '$syllabus' WHERE id = '$id';";
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