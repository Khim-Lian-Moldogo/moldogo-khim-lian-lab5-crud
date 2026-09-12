<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model
{
    public function createUser($data)
    {
        return $this->db->table('users')->insert($data);
    }

    public function getUserByUsername($username)
    {
        return $this->db->table('users')
                        ->where('username', $username)
                        ->get();
    }
}