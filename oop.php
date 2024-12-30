<?php
class Book
{
    private $title, $availableCopies;
    public function __construct($title, $availableCopies)
    {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAvailableCopies()
    {
        return $this->availableCopies;
    }
    public function borrowBook() {}
    public function returnBook() {}
}
class Member
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function borrowBook() {}
    public function returnBook() {}
}
