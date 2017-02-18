<?php

// Get uri
$uri    = $_SERVER['REQUEST_URI'];

// Connect to db
$dbCon = mysqli_connect("localhost","root","","books");

function is_method($method) {
  return $_SERVER['REQUEST_METHOD'] === $method;
}

function matches($regex, $uri) {
  return preg_match($regex, $uri) === 1;
}

// Route: /books
if (matches('/^\/books$/', $uri)) {

    // GET /books
    if (is_method('GET')) {
      $params = $_GET;
      // TODO: ... get all books
    }

    // POST /books
    if (is_method('POST')) {
      $params = $_POST;

      // TODO: ... add a book

      // Create temporary book
      $book = [
        'name'   => $params['name'],
        'author' => $params['author']
      ];

      // Set response code 201 CREATED
      http_response_code(201);

      // Return book in JSON form
      echo json_encode($book);
    }
}

?>
