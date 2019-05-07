<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 07/05/2019
 * Time: 08:46
 */

class arrayProcessing
{
    public function deletingEmptyArrays($listCommits) {

        $arrayList = [];

        foreach ($listCommits as $key => $val) {

            if (!empty($listCommits[$key])) {

                $arrayList[$key] = $listCommits[$key];

            }
        }

        return $arrayList;
    }

    public function createArrayOutput($listCommits) {

        $data = [];

        foreach ($listCommits as $key => $val) {

            $data[$key] = [
                "Monday" => array_fill(0, 24, 0),
                "Tuesday" => array_fill(0, 24, 0),
                "Wednesday" => array_fill(0, 24, 0),
                "Thursday" => array_fill(0, 24, 0),
                "Friday" => array_fill(0, 24, 0),
                "Saturday" => array_fill(0, 24, 0),
                "Sunday" => array_fill(0, 24, 0),
            ];

        }

        return $data;
    }

    public function countNumberCommits($listCommits, $dataArray) {

        foreach ($listCommits as $nameProject => $valProject) {

            for ($i = 0; $i < count($listCommits[$nameProject]); $i++) {

                $hours = getdate(strtotime($listCommits[$nameProject][$i]))["hours"];
                $weekday = getdate(strtotime($listCommits[$nameProject][$i]))["weekday"];

                foreach ($dataArray[$nameProject] as $nameWeekday => $valWeekday) {

                    if ($nameWeekday === $weekday) {

                        foreach ($dataArray[$nameProject][$nameWeekday] as $nameHours => &$numberComments) {

                            if ($nameHours === $hours) {

                                $num = $numberComments;
                                $num++;
                                $numberComments = $num;
                            }
                        }
                    }
                }
            }
        }

        return $dataArray;
    }
}