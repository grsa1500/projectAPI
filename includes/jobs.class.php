<?php

class Job {
    private $db;

    function __construct() {
        // Connecting to database

        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    }

    //Get all Jobs
    function getJob() {

        $sql = "SELECT * FROM job";
        $result = $this->db->query($sql);   
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get for specific course
    function getOneJob($id) {

        $sql = "SELECT * FROM job WHERE id='$id'";
        $result = $this->db->query($sql);   
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Adding courses
    function addJob($title, $place,  $startyear,  $endyear) {
        $sql = "INSERT INTO job (title, place,  startyear, endyear) VALUES ('$title', '$place', '$startyear',  '$endyear');";
        return $this->db->query($sql);
    }

    //Update course
    function updateJob($title, $place,  $startyear,  $endyear, $id) {
        $sql = "UPDATE job SET title = '$title',  place = '$place', startyear = '$startyear',  endyear = '$endyear' WHERE id = '$id';";
        $result = $this->db->query($sql);
        return $result;  
    }


    //Delete course
    function deleteJob($id) {
        
        $sql = "DELETE FROM job WHERE id = $id;";
        $result = $this->db->query($sql);
        return $result;  
     
   
    }


}