<?php

class Json_model{
    public function data_json()
    {
        // persiapkan curl
        $ch = curl_init();

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts");

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($ch);
        $output = json_decode($output, true);

        // tutup curl 
        curl_close($ch);
        //$output = json_encode($output);
        //echo $output;
        // menampilkan hasil curl
        return $output;
        
    }
}
