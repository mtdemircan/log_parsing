<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;


class dsdbController {

     function listModify(){


        $data = [];
        $json= runCommand('cat /var/log/dsdb_json_audit.log | grep  \'"operation": "Modify"\'');
        $json_array=explode("\n",$json);
        for ($i = sizeof($json_array)-1; 0<$i;$i--){
            $obj = json_decode($json_array[$i]);
            $data[] = [
                "userSid" => $obj->dsdbChange->userSid,
                "dn" => $obj->dsdbChange->dn,
                "transactionId" => $obj->dsdbChange->transactionId
            ];
        }
        
        
        
        
        return view('table', [
            "value" => $data,
            "title" => ["userSid","dn","transactionId"],
            "display" => ["userSid","dn","transactionId"],    
        ]);
    

    }
    function listAdd(){
     
        $json= runCommand('cat /var/log/dsdb_json_audit.log | grep \'"operation": "Add"\'');
        $data = [];
        $json_array=explode("\n",$json);
        for ($i = sizeof($json_array)-1; 0<$i;$i--){
            $obj = json_decode($json_array[$i]);
            $data[] = [
                "userSid" => $obj->dsdbChange->userSid,
                "dn" => $obj->dsdbChange->dn,
                "transactionId" => $obj->dsdbChange->transactionId
            ];
        }
        
       
        return view('table', [
            "value" => $data,
            "title" => ["userSid","dn","transactionId"],
            "display" => ["userSid","dn","transactionId"],    
        ]);
    

    }
    function listDelete(){
       
        $json= runCommand('cat /var/log/dsdb_json_audit.log | grep  \'"operation": "Delete"\''); 
        $data = [];
        $json_array=explode("\n",$json);
        for ($i = sizeof($json_array)-1; 0<$i;$i--){
            $obj = json_decode($json_array[$i]);
            $data[] = [
                "userSid" => $obj->dsdbChange->userSid,
                "dn" => $obj->dsdbChange->dn,
                "transactionId" => $obj->dsdbChange->transactionId
            ];
        }
        
       return view('table', [
            "value" => $data,
            "title" => ["userSid","dn","transactionId"],
            "display" => ["userSid","dn","transactionId"],    
        ]);
    

    }
    function listAuth(){
       
        $output= runCommand('cat /var/log/samba/log.samba | grep -a "auth_check_password_recv"'); 
        $data = [];
        $output2=explode("\n",$output);
        for ($i = sizeof($output2)-1; 0<$i;$i-=2){
            $time=substr($output2[$i-1],1,26);
            $user=substr($output2[$i],strpos($output2[$i],'['),strpos($output2[$i],']')-strpos($output2[$i],'[')+1);
            $status=substr($output2[$i],strpos($output2[$i],']')+1);
            $data[] = [
                "Time"=> $time,
                "Auth" => $user,
                "Status" =>  $status
            ];
        }
        
       return view('table', [
            "value" => $data,
            "title" => ["Time","User","Status"],
            "display" => ["Time","Auth","Status"],    
        ]);
    

    }
    function listLogs(){
       $logTypes=array("all","tdb","printdrivers","lanman","smb","smb2","smb2_credits","rpc_parse","rpc_srv","rpc_cli","passdb","sam","auth","winbind","vfs","idmap","quota","acls","locking","msdfs","dmapi","registry","scavenger","dns","ldb","tevent","auth_audit","auth_json_audit","kerberos","dsdb_audit","dsdb_json_audit","dsdb_password_audit","dsdb_password_json_audit","dsdb_transaction_audit","dsdb_transaction_json_audit");
        //runCommand('sed '/log level/s/$/ $log/' /etc/samba/smb.conf'); 
        $str=substr($str,13);
        $data = [];
        $output2=explode(" ",$str2);
        
        for ($i =1; $i<sizeof($output2);$i++){
            $log=substr($output2[$i],0,strpos($output2[$i],':'));
            $data[] = [
                "log"=> $log        
            ];
        }
        
       return view('table', [
            "value" => $data,
            "title" => ["log"],
            "display" => ["log"],    
        ]);
    

    }
}