<?php

// Read JSON file
$json = file_get_contents('./data.json');

//Decode JSON
$json_data = json_decode($json,true);

//Print data
print_r($json);