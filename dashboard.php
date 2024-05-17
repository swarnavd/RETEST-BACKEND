<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="./CSS/landing-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body>
  <header>
    <nav class="nav-padding"><!--nav bar starts-->
      <div class="wrapper flexspacebetween flex-aligncenter">
        <ul>
          <!--navigation menu styling starts from here-->
          <li><a href="/login">Log in as Admin</a></li>
          <!--navigation menu styling ends from here-->
        </ul>
      </div>
    </nav>
  </header>
  <main class="wrapper">
    <button type="button" id="healthy">Healthy Category</button>
    <button type="button" id="unhealthy">UnHealthy Category</button>
    <div class="default-show">
    </div>
    <div class="details" style="display:none;">
      <form id="customer_form">
        <label for="customer_name">Name of the customer:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>

        <label for="customer_email">Email of the customer:</label>
        <input type="email" id="customer_email" name="customer_email" required><br>

        <label for="customer_phone">Phone number of the customer:</label>
        <input type="text" id="customer_phone" name="customer_phone" required><br>

        <label for="total_amount">Total payable amount:</label>
        <input type="text" id="total_amount" name="total_amount" disabled><br>

        <button type="submit" id="customer_submit">Submit</button>
      </form>
    </div>
  </main>
  <script src="./JS/script.js"></script>
</body>

</html>
