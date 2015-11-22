<?php
Class Model_login extends CI_Model
{
 function login($username, $password)
 {

  $username = htmlspecialchars($username);
  $password = htmlspecialchars($password);
   $this -> db -> select('cid, username, password');
   $this -> db -> from('customers');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>