<?php

$topStoryIds = file_get_contents('https://hacker-news.firebaseio.com/v0/topstories.json');

$topStoryIds = array_slice(json_decode($topStoryIds), 0, 10);

foreach ($topStoryIds as $id) {
    $story = json_decode(file_get_contents('https://hacker-news.firebaseio.com/v0/item/' . $id . '.json'));

    echo "<a href='{$story->url}'>{$story->title}</a> by {$story->by}<br>";
}