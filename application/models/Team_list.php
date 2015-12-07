<?php

/**
 * Obtains the data from the database that is used to display all the team names
 * from the NFL and what division and conference they are in. 
 *
 * @author Gerald Becker
 */
class Team_list extends CI_Model {
    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /*
     * Pulls a listing of all the teams in the NFL.
     */
    public function allTeams() {
        $this->db->order_by("CITY", "asc");        
        $query = $this->db->get('teams');
        return $query->result_array();
    }

    
    public function record_count() {
        return $this->db->count_all("teams");
    }
    
    public function get($limit, $start, $orderby, $orderdir) {
        $columns = array("CITY", "NAME", "CONFERENCE", "DIVISION");
        $orderTeamsBy = (in_array($orderby, $columns)) ? $orderby : "CITY";
        $orderTeamsDir = ($orderdir == "desc") ? "desc" : "asc";
        
        $this->db->limit($limit, $start);
        $this->db->order_by($orderTeamsBy, $orderTeamsDir);
        $query = $this->db->get('teams');
        return $query->result_array();
    }
    
    //public function getAFCTeams($limit, $start, $orderby, $orderdir) {
    public function getAFCTeams($orderby, $orderdir) {    
        $columns = array("CITY", "NAME", "CONFERENCE", "DIVISION");
        $orderTeamsBy = (in_array($orderby, $columns)) ? $orderby : "CITY";
        $orderTeamsDir = ($orderdir == "desc") ? "desc" : "asc";
        
        //$this->db->limit($limit, $start);
        $this->db->order_by($orderTeamsBy, $orderTeamsDir);
        $query = $this->db->get_where('teams', array('conference' => "American Football Conference"));
        return $query->result_array();
    }
        
    //public function getNFCTeams($limit, $start, $orderby, $orderdir) {
    public function getNFCTeams($orderby, $orderdir) {
        $columns = array("CITY", "NAME", "CONFERENCE", "DIVISION");
        $orderTeamsBy = (in_array($orderby, $columns)) ? $orderby : "CITY";
        $orderTeamsDir = ($orderdir == "desc") ? "desc" : "asc";
        
        //$this->db->limit($limit, $start);
        $this->db->order_by($orderTeamsBy, $orderTeamsDir);
        $query = $this->db->get_where('teams', array('conference' => "National Football Conference"));
        return $query->result_array();
    }
}
