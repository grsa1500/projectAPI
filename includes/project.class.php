<?php

class Project {
    private $db;

    function __construct() {
        // Connecting to database

        $this->db = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);
    }

    //Get all projects
    function getProject() {

        $sql = "SELECT * FROM project";
        $result = $this->db->query($sql);   
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Get for specific course
    function getOneProject($id) {

        $sql = "SELECT * FROM project WHERE id='$id'";
        $result = $this->db->query($sql);   
  
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    //Adding courses
    function addProject($title, $description, $url, $img, $imgmobile, $keywords) {
        $sql = "INSERT INTO project (title, description, url, img, imgmobile, keywords) VALUES ('$title', '$description','$url', '$img', '$imgmobile', '$keywords');";
        return $this->db->query($sql);
    }

    //Update course
    function updateProject($title, $description, $url, $img, $imgmobile, $keywords, $id) {
        $sql = "UPDATE project SET title = '$title',  description = '$description', url = '$url',  img = '$img', imgmobile = '$imgmobile', keywords = '$keywords' WHERE id = '$id';";
        $result = $this->db->query($sql);
        return $result;  
    }


    //Delete course
    function deleteProject($id) {
        
        $sql = "DELETE FROM project WHERE id = $id;";
        $result = $this->db->query($sql);
        return $result;  
     
   
    }


}