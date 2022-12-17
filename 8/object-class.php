<?php

class Conversation
{
}

$obj = new Conversation();

// php 7 way
//switch(get_class($obj)) {

// php 8 can
switch($obj::class) {
    case 'Conversation':
        $type = 'started_conversation';
        break;

    case 'Reply':
        $type = 'replied_to_conversation';
        break;

    case 'Comment':
        $type = 'commented_on_lesson';
        break;
}

var_dump($type);