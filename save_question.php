<?php
include 'dbcon.php';
extract($_POST);

if (empty($id)) {
    $last_order = $conn->query("SELECT * FROM questions where qid = $qid order by order_by desc limit 1")->fetch_array()['order_by'];
	$order_by = $last_order > 0 ? $last_order + 1 : 0;
	$data = 'question = "'.$question.'" ';
	$data .= ', order_by = "'.$order_by.'" ';
	$data .= ', qid = "'.$qid.'" ';
    
    $insert_question = insertData($conn, 'questions', $data);
    if ($insert_question) {
        $question_id = $conn->insert_id;
        $insert = array();
        for ($i = 0; $i < count($question_opt); $i++) {
            $is_right = isset($is_right[$i]) ? 1 : 0;
            $data = array(
                'question_id' => $question_id,
                'option_txt' => $question_opt[$i],
                'is_right' => $is_right
            );
            $insert[] = insertData($conn, 'question_opt', $data);
        }
        if (count($insert) == 4) {
            echo 1;
        } else {
            deleteQuestion($conn, $question_id);
            echo 2;
        }
    }
} else {
    $data = array('question' => $question, 'qid' => $qid);
    $update = updateData($conn, 'questions', $data, "id = $id");
    if ($update) {
        deleteOptions($conn, $id);
        $insert = array();
        for ($i = 0; $i < count($question_opt); $i++) {
            $answer = isset($is_right[$i]) ? 1 : 0;
            $data = array(
                'question_id' => $id,
                'option_txt' => $question_opt[$i],
                'is_right' => $answer
            );
            $insert[] = insertData($conn, 'question_opt', $data);
        }
        if (count($insert) == 4) {
            echo 1;
        } else {
            deleteQuestion($conn, $id);
            echo 2;
        }
    }
}

// Function to insert data into a table and return the result
function insertData($conn, $table, $data)
{
    $keys = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $sql = "INSERT INTO $table ($keys) VALUES ($values)";
    return $conn->query($sql);
}

// Function to update data in a table and return the result
function updateData($conn, $table, $data, $condition)
{
    $set = [];
    foreach ($data as $key => $value) {
        $set[] = "$key = '$value'";
    }
    $set = implode(", ", $set);
    $sql = "UPDATE $table SET $set WHERE $condition";
    return $conn->query($sql);
}

// Function to delete a question and its options
function deleteQuestion($conn, $question_id)
{
    $conn->query("DELETE FROM questions WHERE id = $question_id");
    $conn->query("DELETE FROM question_opt WHERE question_id = $question_id");
}

// Function to delete options for a question
function deleteOptions($conn, $question_id)
{
    $conn->query("DELETE FROM question_opt WHERE question_id = $question_id");
}