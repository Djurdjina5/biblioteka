<?php
class Book
{
    public $id;
    public $title;
    public $author;
    public $person;
    public $deadline;

    public function __construct($id = null, $title = null, $author = null, $person = null, $deadline = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->person = $person;
        $this->deadline = $deadline;
    }
    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM books";
        return $conn->query($query);
    }

    #funkcija getById

    public static function getByUser($username, mysqli $conn)
    {
        $query = "SELECT id,title,author,deadline FROM books WHERE person='$username'";
        return $conn->query($query);
    }

    #deleteById

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM books WHERE id=$this->id";
        return $conn->query($query);
    }

    #razduzi
    public function razduzi($id, mysqli $conn)
    {
        $query = "UPDATE books set person = $this->null,deadline = $this->null WHERE id=$id";
        return $conn->query($query);
    }
    public static function zaduzi($id, $deadline, $username, mysqli $conn)
    {
        //$query = "UPDATE books set person = $username,deadline = $deadline WHERE id=$id";
        //$query = "UPDATE books set person = $username,deadline= $deadline WHERE id=$id";
        $query = "UPDATE books SET person =  '$username', deadline =  '$deadline' WHERE id = '$id'";
        //$query = "UPDATE books SET person = " . $username . " , deadline = " . $deadline . " WHERE id = " . $id;
        return $conn->query($query);
    }

    #insert add
    public static function add(Book $book, mysqli $conn)
    {
        $query = "INSERT INTO books (id, title, author, person, deadline) VALUES ('$book->id', '$book->title', '$book->author', NULL, NULL)";
        return $conn->query($query);
    }
}
