<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {

    public function read() {
        return $this->db->table('jld_users')->get_all();
    }

    public function create($jld_LastName, $jld_FirstName, $jld_Email, $jld_Gender, $jld_Address) {
        $data = array(
            'jld_LastName' => $jld_LastName,
            'jld_FirstName' => $jld_FirstName,
            'jld_Email' => $jld_Email,
            'jld_Gender' => $jld_Gender,
            'jld_Address' => $jld_Address
        );

        return $this->db->table('jld_users')->insert($data);
    }

    public function get_one($id) {
        // Replace 'get_one()' with 'get()' to fetch the data
        return $this->db->table('jld_users')
                        ->where('id', $id)
                        ->get();  
    }

    public function update($id, $jld_LastName, $jld_FirstName, $jld_Email, $jld_Gender, $jld_Address) {
        $data = array(
            'jld_LastName' => $jld_LastName,
            'jld_FirstName' => $jld_FirstName,
            'jld_Email' => $jld_Email,
            'jld_Gender' => $jld_Gender,
            'jld_Address' => $jld_Address
        );

        return $this->db->table('jld_users')
                        ->where('id', $id)
                        ->update($data);
    }

    public function delete($id) {
        return $this->db->table('jld_users')->where('id', $id)->delete();
    }
}

