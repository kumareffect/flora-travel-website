<?php

session_start();
require('connect.php');

function dd($value) 
{
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}

function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    
    // Check if prepare was successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $values = array_values($data);
    $types = str_repeat('s', count($values)); // Adjust type string based on actual data types

    // Create a reference array for bind_param
    $refs = array_merge([$types], $values);
    call_user_func_array([$stmt, 'bind_param'], $refs); // Use call_user_func_array to bind parameters

    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = []) {
    global $conn;
    $sql = "SELECT * FROM $table";
    
    if (empty($conditions)) {
        // Prepare and execute without conditions
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->execute();
        
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql .= " WHERE $key=?";
            } else {
                $sql .= " AND $key=?";
            }
            $i++;
        }

        // Prepare the statement with conditions
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $values = array_values($conditions);
        $types = str_repeat('s', count($values)); // Adjust type string based on actual data types
        $stmt->bind_param($types, ...$values); // Spread operator to bind parameters
        
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql .= " WHERE $key=?";
        } else {
            $sql .= " AND $key=?";
        }
        $i++;
    }

    $sql .= " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}

function create($table, $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql .= " $key=?";
        } else {
            $sql .= ", $key=?";
        }
        $i++;
    }
    
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function update($table, $id, $data)
{
    global $conn;
    $sql = "UPDATE $table SET ";

    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql .= " $key=?";
        } else {
            $sql .= ", $key=?";
        }
        $i++;
    }

    $sql .= " WHERE id=?";
    $data['id'] = $id; // Add the id to the data array for binding
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

function delete($table, $id) {
    global $conn; 

    $id = mysqli_real_escape_string($conn, $id);  
    $sql = "DELETE FROM $table WHERE id = ?";  // Use prepared statements for security

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); // Assuming id is an integer
    return $stmt->execute();  
}

function getPublishedPosts()
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

    $stmt = executeQuery($sql, ['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function searchPosts($term)
{
    global $conn;
    $match = '%' . $term . '%'; // Prepare the search term with wildcards
    $sql = "SELECT 
                p.*, u.username 
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND (p.title LIKE ? OR p.body LIKE ?)"; // Added parentheses for correct logical grouping

    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
