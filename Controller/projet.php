<?php
require_once '../../config.php';
include '../../Model/user.php';



class userC
{
    public function afficherUser()
    {
        $sql = "SELECT user.*, admin.role FROM user 
            LEFT JOIN admin ON user.id = admin.id_user  
            ORDER BY user.id DESC";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function DeleteUser($id)
    {
        $db = config::getConnexion();
        $sql = "DELETE FROM admin WHERE id_user = :id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
        $sql = "DELETE FROM user WHERE id = :id";
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function AddUser($user)
    {
        $sql = "INSERT INTO user (uname, email, pswd, dateN, image) 
            VALUES (:uname, :email, :pswd, :dateN, :image)";
        $mdp = $user->getPswd();
        $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'uname' => $user->getUname(),
                'email' => $user->getEmail(),
                'pswd' => $mdp_hash,
                'dateN' => $user->getdateN(),
                'image' => $user->getImage()
            ]);

            // Retrieve the ID of the newly added user
            $id_user = $db->lastInsertId();

            // Add a corresponding row in the 'admin' table with default role and the user ID as foreign key
            $sql_admin = "INSERT INTO admin (id_user, role) VALUES (:id_user, '1')";
            $query_admin = $db->prepare($sql_admin);
            $query_admin->execute(['id_user' => $id_user]);

        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function userMail($email)
    {
        $sql = "SELECT * from user where email='$email'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $utilisateur = $query->fetch();
            return $utilisateur;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function ChangeMdpUser($id, $newpass)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    pswd= :newpass
                WHERE id= :id'
            );
            $query->execute([
                'newpass' => $newpass,
                'id' => $id
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function UpdateUser($user, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
                    uname = :uname, 
                    email = :email, 
                    pswd = :pswd ,
                    dateN = :dateN ,
                    image = :image 
                WHERE id= :id'
            );
            $query->execute([
                'uname' => $user->getUname(),
                'email' => $user->getEmail(),
                'pswd' => $user->getPswd(),
                'dateN' => $user->getdateN(),
                'image' => $user->getImage(),
                'id' => $id
            ]);

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function login($email, $pswd)
    {
        $result = null;
        $verif = null;
        $db = config::getConnexion();

        $sql = "SELECT user.*, admin.role FROM user 
        JOIN admin ON user.id = admin.id_user 
        WHERE user.email = :email";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function vérifierEmail($email)
    {
        $liste = null;
        $sql = "SELECT * from user where email='$email'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $liste = $query->fetch();
            return $liste;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function recupereruserrole($id)
    {
        $sql = "SELECT user.*, admin.role FROM user  INNER JOIN admin  ON user.id = admin.id_user WHERE user.id=$id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recupereruser($id)
    {
        $sql = "SELECT * from  user where id=$id";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function modifieruser($user, $id)
    {
        try {

            $query = null;
            $db = config::getConnexion();


            if ($user->getImage() == null) {
                $query = $db->prepare(
                    'UPDATE user SET 
							uname = :uname, 
							email = :email,
							pswd= :pswd,
							dateN = :dateN,
						
							
						WHERE id = :id'
                );

                $query->execute([
                    'uname' => $user->getUname(),
                    'email' => $user->getEmail(),
                    'pswd' => $user->getPswd(),
                    'dateN' => $user->getdateN(),

                    'id' => $id

                ]);
            } else {


                $query = $db->prepare(
                    'UPDATE user SET 
							uname = :uname, 
							email = :email,
							pswd = :pswd,
							dateN = :dateN,
						
							image = :image
						WHERE id = :id'
                );
                $query->execute([
                    'uname' => $user->getUname(),
                    'email' => $user->getEmail(),
                    'pswd' => $user->getPswd(),
                    'dateN' => $user->getdateN(),

                    'id' => $id,
                    'image' => $user->getImage()
                ]);
            }




            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function modifieruserrole($user, $id, $role)
    {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE user SET 
                    uname = :uname, 
                    email = :email,
                    pswd = :pswd,
                    dateN = :dateN,
                    image = :image
                WHERE id = :id'
            );

            $query->execute([
                'uname' => $user->getUname(),
                'email' => $user->getEmail(),
                'pswd' => $user->getPswd(),
                'dateN' => $user->getdateN(),
                'image' => $user->getImage(),
                'id' => $id
            ]);

            $query = $db->prepare(
                'UPDATE admin SET 
                    role = :role
                WHERE id_user = :id'
            );

            $query->execute([
                'role' => $role,
                'id' => $id
            ]);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    function triuserAsc()
    {
        $db = config::getConnexion();
        $sql = "SELECT user.*, admin.role FROM user 
        LEFT JOIN admin ON user.id = admin.id_user  
        ORDER BY user.id ASC";

        try {
            return $db->query($sql);
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }

    }
    function triuserdesc()
    {
        $db = config::getConnexion();
        $sql = "SELECT user.*, admin.role FROM user 
        LEFT JOIN admin ON user.id = admin.id_user  
        ORDER BY user.id DESC";
        ;

        try {
            return $db->query($sql);
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }

    }
    function countUsers()
    {
        $sql = "SELECT COUNT(*) as count FROM user";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            $count = $result->fetch()['count'];
            echo $count;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}


?>