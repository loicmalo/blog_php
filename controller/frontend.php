<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new lm\Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new lm\Blog\Model\PostManager();
    $commentManager = new lm\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function comment()
{
    $commentManager = new lm\Blog\Model\CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

    require('view/frontend/commentView.php');
}
function addComment($postId, $author, $comment)
{
    $commentManager = new lm\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function editComment($commentId, $comment)
{
    $commentManager = new lm\Blog\Model\CommentManager();

    $affectedLines = $commentManager->updateComment($commentId, $comment);
    if ($affectedLines === false){
        throw new Exception('Impossible de modifier le commentaire !');
        
    }
    else{
        header('Location: index.php?action=comment&id=' . $commentId);
    }
}