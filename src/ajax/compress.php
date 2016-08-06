<?php
$siteID = Request::postParam("siteID");
$siteInfo = $this->getSiteInfo($siteID);

if($siteInfo){
  $this->removeData("log");
  $Process = new Fr\Process(Fr\Process::getPHPExecutable(), array(
    "arguments" => array(
      0 => L_DIR . '/lobby.php',
      1 => "app",
      "--a" => "site-compressor",
      "--i" => "src/ajax/compress-bg.php",
      "--data" => "siteID=$siteID"
    )
  ));
  
  $that = $this;
  $command = $Process->start(function() use ($that){
    echo "started";
  });
  $this->log("Command executed for compression : $command");
}
