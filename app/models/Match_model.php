<?php

class Match_model{
    public function get_token()
    {
        $ch = curl_init();

        $header = array(
            'Post_User:' . '3x4n_57',
            'Post_Pass:' . 'M1r34cl3@_@Ez4km!57',
            'Token:' . $this->tokenServer()
        );

        /*Post_User:3x4n_57
    Post_Pass:M1r34cl3@_@Ez4km!57
    Token: tokenServer()*/

        curl_setopt($ch, CURLOPT_URL, "http://165.22.250.214/fire_lifescore/public/Api_Investigasi/kuy_l0giN");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array("Inpt_User" => "3x4n_57", "Inpt_Pass" => "H3S0y4m_535130052"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);
        //var_dump($result);

        $token_jwt = $result['data']['token'];

        //var_dump($token_jwt);
        return $token_jwt;
    }


    public function data_match(){
    $ch = curl_init();

    $header = array(
        'Post_User:'.'3x4n_57',
        'Post_Pass:'.'M1r34cl3@_@Ez4km!57',
        'Token:'. $this->tokenServer(),
        'Token_Jwt:'. $this->get_token(),
        'user:'.'3x4n_57'
    );

    curl_setopt($ch, CURLOPT_URL, "http://165.22.250.214/fire_lifescore/public/Api_Livescore/get_scheduleNr_limit");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array("Inpt_User"=>"3x4n_57", "Inpt_Pass"=>"H3S0y4m_535130052"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    curl_close($ch);

    $data_match = json_decode($result, true);
    //var_dump($data_match);

    $data_match = $data_match['data'];


        //$result = json_decode($result, true);

        //$data_match = data_match();
        echo json_encode($data_match);
}
//data_match();
//$data_match = json_encode($data_match);



private function tokenServer()
    {
        $date  = new DateTime("now", new DateTimeZone('America/New_York') );
        $day   = $date->format('d');
        $month = $date->format('m');
        $year  = $date->format('Y');
        $token = $month.base64_encode ("_H3s0").$day."y4M".$year;
        $token = base64_encode ( $token )."_ChR0noXCX1001";
        $token = md5 ( $token );
        return $token;
    }
}
