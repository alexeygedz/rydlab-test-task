<?php

class apiGit
{
    public function requestApiGitRepository($url) {

        $result =[];
        $countArray = 0;
        $countUrl = 1;
        $emptyJson = false;

        while (!$emptyJson) {

            $urlParse = $url . '?page=' . $countUrl;

            $cInit = curl_init();
            curl_setopt($cInit, CURLOPT_URL, $urlParse);
            curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); // 1 = TRUE
            curl_setopt($cInit, CURLOPT_HTTPHEADER, [
                'Accept: application/vnd.github.v3+json',
                'Authorization: token 3a91f338076ccc706018a010f4ac527c111416fc',
                'User-Agent: alexeygedz'
            ]);

            $output = curl_exec($cInit);

            curl_close($cInit);

            $parseJson = json_decode($output, true);

            $emptyJson = empty($parseJson);

            $result[$countArray] = $parseJson;

            $countArray++;
            $countUrl++;
        }

        return $result;
    }

    public function requestApiGitCommits($url) {

        $currentDate = date('Y-m-d');
        $yearAgo = date('Y-m-d', strtotime('-1 year'));

        $url = $url . '?since=' . $currentDate. '?until=' . $yearAgo;

        $cInit = curl_init();
        curl_setopt($cInit, CURLOPT_URL, $url);
        curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); // 1 = TRUE
        curl_setopt($cInit, CURLOPT_HTTPHEADER, [
            'Accept: application/vnd.github.v3+json',
            'Authorization: token 3a91f338076ccc706018a010f4ac527c111416fc',
            'User-Agent: alexeygedz'
        ]);

        $output = curl_exec($cInit);

        curl_close($cInit);

        return $result = json_decode($output, true);
    }
}