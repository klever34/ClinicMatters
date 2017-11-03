
<html>
<head><title>Patient</title>
  <link rel="stylesheet" href="_/css/bootstrap.min.css">
  <link rel="stylesheet" href="_/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="_/css/free.css" type="text/css" />
  <link href='https://fonts.googleapis.com/css?family=Bree+Serif|Merriweather:400,300,300italic,700,700italic,400italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="_/css/screen.css">
</head>
<body>
<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">

        <a class="navbar-brand" href="#featured"><h1 style="color:#337ab7">Clinic <span class="subhead">Matters</span></h1></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">
          <ul class="nav navbar-nav navbar-right">
                  <li ><a href="logout.php">Logout</a></li>
              </ul>
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>
</header>
  <h1 class="page-header">Create Patient</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <!-- <div class="text-center">
        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block well well-sm"> -->
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

      <h3>Personal info</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Age</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Gender</label>
          <div class="col-lg-8">
            <input class="form-control"  type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Illness:</label>
          <div class="col-md-8">
            <select>
                <option>Typhoid</option>
                <option>Malaria</option>
                <option>Typhoid&Malaria</option>
                <option>Others</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Bill:</label>
          <div class="col-md-8">
            <input class="form-control"  type = number >
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
