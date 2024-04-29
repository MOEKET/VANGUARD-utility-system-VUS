// user_crud.php
<?php
include('db_connection.php');

// Function to create a new user
function createUser($username, $password, $user_type){
    global $conn;
    $hashed_password = md5($password); // Hash password for storage

    $sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$hashed_password', '$user_type')";
    $result = $conn->query($sql);
    if($result === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to read user information
function getUser($user_id){
    global $conn;
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Function to update user information
function updateUser($user_id, $username, $password, $user_type){
    global $conn;
    $hashed_password = md5($password); // Hash password for storage

    $sql = "UPDATE users SET username='$username', password='$hashed_password', user_type='$user_type' WHERE user_id='$user_id'";
    $result = $conn->query($sql);
    if($result === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a user
function deleteUser($user_id){
    global $conn;
    $sql = "DELETE FROM users WHERE user_id='$user_id'";
    $result = $conn->query($sql);
    if($result === TRUE) {
        return true;
    } else {
        return false;
    }
}
?>
