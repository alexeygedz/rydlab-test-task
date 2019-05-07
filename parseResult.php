<?php

class parseResult
{
    public function getListRepo($dataRepository) {

        $listRepository =[];
        $count = 0;

        foreach ($dataRepository as $item) {

            foreach ($item as $key=>$val) {

                $listRepository[$count] = $item[$key]['name'];

                $count++;
            }
        }

        return $listRepository;
    }

    public function getListCommit ($dataCommits) {

        $listCommits =[];
        $count = 0;

        foreach ($dataCommits as $item) {

            $listCommits[$count] = $item['commit']['author']['date'];

            $count++;
        }

        return $listCommits;
    }
}