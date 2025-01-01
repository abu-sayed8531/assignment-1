<?php
class Book
{
    private $title, $availableCopies;
    public $members = [];
    public function __construct(string $title, int $availableCopies)
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
    public function borrowBook($member)
    {
        if ($this->availableCopies > 0) {
            $this->members[] = $member->getName();
            $this->availableCopies--;
            return true;
        }
        return false;
    }
    public function returnBook()
    {
        $this->availableCopies++;
    }
}
class Member
{
    private $name;
    public $books = [];
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function borrowBook($book)
    {
        $available = $book->getAvailableCopies();
        if (!$available > 0) {
            echo "The {$book->getTitle()} is not available";
            exit();
        }
        $this->books[] = $book->getTitle();
        $book->borrowBook($this);
    }
    public function returnBook($book)
    {
        if (in_array($book->getTitle(), $this->books)) {
            $book->returnBook();
            $title = $book->getTitle();
            $key = array_search($title, $this->books);

            unset($this->books[$key]);
            //var_dump($this->books);
            array_values($this->books);

            return true;
        }
        echo "You are not eligible to return this book";
        exit();
    }
}

$member1 = new Member('John Doe');
$member2 = new Member('John Smith');
$book1 = new Book('The Great Gatsby', 5);
$book2 = new Book('To Kill a Mockingbird', 3);
$member1->borrowBook($book1);
$member2->borrowBook($book2);

//$member1->returnBook($book1);

function displayBook($book)
{
    echo "Available copies of \"{$book->getTitle()}\" is: {$book->getAvailableCopies()} </br>";
}
displayBook($book1);
displayBook($book2);
