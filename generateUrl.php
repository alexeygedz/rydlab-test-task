<?php

class generateUrl
{
    public function getGenerateUrlRepository($user) {

        $urlRepository = 'https://api.github.com/users/' . $user . '/repos';

        return $urlRepository;
    }

    public function getGenerateUrlCommits($user, $nameRepository) {

        $urlCommits = 'https://api.github.com/repos/' . $user . '/' . $nameRepository . '/commits';

        return $urlCommits;
    }
}