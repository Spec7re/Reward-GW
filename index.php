<?php
require_once("curl_helper.php");
$action = "GET";
$url = "URL HERE";
$parameters = array("param" => "value");
$result = CurlHelper::perform_http_request($action, $url, $parameters);
$result = json_decode($result, true);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Reward Gateway</title>
  </head>
  <body>
    <div class="container">
      <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3 nav-rcorner">
          <a style="padding-left: 10px;" class="navbar-brand" href="#">RewardIn</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="#">People</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Connections</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Locations</a>
              </li>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="list-group">
            <?php if (!array_key_exists('code', $result)) : ?>
              <?php for($i = 0; $i < 10; ++$i) : ?>
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-1">
                      <img class="avatar" src="<?php echo $result[$i]['avatar']; ?>" alt="Avatar">
                    </div>
                    <div class="col-md-9 pl-5">
                      <h5 class="mb-1"><?php echo $result[$i]['name']; ?></h5>
                      <h6 class="mb-1 font-weight-bold"><?php echo $result[$i]['title'] ? $result[$i]['title']: "No title provided" ; ?></h6>
                      <p class="mb-1"><?php echo $result[$i]['bio'] ? $result[$i]['bio']: "No bio provided" ; ?></p>
                      <h6><?php echo $result[$i]['company']; ?></h6>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-outline-primary btn-sm w-100 rcorner">Connect</button>
                    </div>
                  </div>
                </a>
              <?php endfor;
            endif; ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="div-wrap searches mb-4">
            <h4>Saved searches</h4>
            <p>Save this search to get notified as new results become available.</p>
            <button class="btn btn-outline-primary btn-sm w-100 rcorner" type="button" name="button">Create search alert</button>
          </div>
          <div class="div-wrap">
            <img class="advert" width="450" height="370" src="img/join_our_team.jpg" alt="Avatar">
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
