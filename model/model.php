<?php
function getPosts()
{
    $dbh = dbhConnect();
    $request = $dbh -> query('SELECT id, title, content FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

    return $request;
}

function getPost($postId) 
{
    $dbh = dbhConnect();
    $request = $dbh -> prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
    $request -> execute(array($postId));
    $post = $request -> fetch();

    return $post;
}

function getComments($postId) 
{
    $dbh = dbhConnect();
    $comments = $dbh -> prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments -> execute(array($postId));

    return $comments;
}


function dbhConnect() //allows connection to database
{
    try
    {
        $dbh = new PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8', 'root', '');
        return $dbh;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
