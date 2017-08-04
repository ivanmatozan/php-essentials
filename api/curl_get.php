<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://hacker-news.firebaseio.com/v0/topstories.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

if (!curl_getinfo($ch)['http_code'] === 200) {
    die('Something went wrong');
}

$topStoryIds = array_slice(json_decode($result), 0, 5);

foreach ($topStoryIds as $id) {
    curl_setopt($ch, CURLOPT_URL, 'https://hacker-news.firebaseio.com/v0/item/' . $id . '.json');

    $result = curl_exec($ch);

    if (curl_getinfo($ch)['http_code'] === 200) {
        $story = json_decode($result);

        echo "<a href='{$story->url}'>{$story->title}</a> by {$story->by}<br>";
    }
}