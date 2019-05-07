<?php

require 'apiGit.php';
require 'parseResult.php';
require 'generateUrl.php';
require 'arrayProcessing.php';
require 'outputConsole.php';

$request = new apiGit();
$parse = new parseResult();
$generate = new generateUrl();
$processing = new arrayProcessing();
$output = new outputConsole();

$dataAvailability = true;
$user = $argv[1];

$urlRepository = $generate->getGenerateUrlRepository($user);

$dataRepository = $request->requestApiGitRepository($urlRepository);

$listRepository = $parse->getListRepo($dataRepository);

for ($i = 0; $i < count($listRepository); $i++) {

    $nameRepository = $listRepository[$i];

    $urlCommits = $generate->getGenerateUrlCommits($user, $nameRepository);

    $dataCommits = $request->requestApiGitCommits($urlCommits);

    $listCommits[$nameRepository] = $parse->getListCommit($dataCommits);
}

$listCommits = $processing->deletingEmptyArrays($listCommits);

$dataArray = $processing->createArrayOutput($listCommits);

$dataArray = $processing->countNumberCommits($listCommits, $dataArray);

$output->printConsole($dataArray);