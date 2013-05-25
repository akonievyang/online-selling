<?php
    include "BaseDAO.php";

    class Account extends BaseDAO{
        function LogInAdmin($username, $password){

            $this->open();

            $stmt=$this->dbh->prepare(" SELECT admin_ID from admin where userAdmin=?  and passAdmin=password(?) ");
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$password);
            $stmt->execute();

            $row = $stmt->fetch();
            return $row[0];

            $this->close();

        }
        function loginMember($username,$password){
            $this->open();

            $stmt=$this->dbh->prepare("SELECT customer_id from customer where username=?  and password=password(?)  ");
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$password);
            $stmt->execute();

            $row = $stmt->fetch();
            return $row[0];

            $this->close();
        }

        function SearchUser($customer_id){
            $this->open();
            $stmt=$this->dbh->prepare("SELECT firstname, lastname from customer where customer_id=?");
            $stmt->bindParam(1,$customer_id);

            $stmt->execute();

            $rows=$stmt->fetch();
            $user_name=$rows[1]." ".$rows[0];
            return $user_name;

            $this->close();
        }
        function Search_admin_user($admin_id){
            $this->open();
            $stmt=$this->dbh->prepare("SELECT firstname, lastname from admin where admin_ID=?");
            $stmt->bindParam(1,$admin_id);

            $stmt->execute();

            $rows=$stmt->fetch();
            $user_admin=$rows[1]." ".$rows[0];
            return $user_admin;

            $this->close();

        }
    }
?>