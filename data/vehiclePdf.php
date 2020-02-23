<?php  
if(!isset($_SESSION)) { session_start(); }
    // include "all_functions.php";

    $value = $_SESSION['v_no'];

    $result= getVehicleUsers($value);

    $insurance = getInsuranceData($value);

    $features = allFeatures();

    $get_features = getFeatures($insurance['v_ins_id']);

    $active_features = getActiveFeatures($insurance['v_ins_id']);
   	
   	
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        /*background-color: #f6f6f6;*/
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        /*background-color: #f6f6f6;*/
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        /*max-width: 680px;*/
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 780px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        /*background: #ffffff;*/
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          /*background-color: #ffffff;*/
          border-radius: 5px;
          text-align: center; 
      }
        .btn a {
          /*background-color: #ffffff;*/
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        /*background-color: #3498db; */
      }

      .btn-primary a {
        /*background-color: #3498db;*/
        border-color: #3498db;
        color: #ffffff; 
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; 
        }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; 
        }
        table[class=body] .content {
          padding: 0 !important; 
        }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table[class=body] .btn table {
          width: 100% !important; 
        }
        table[class=body] .btn a {
          width: 100% !important; 
        }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
        .btn-primary table td:hover {
          /*background-color: #34495e !important; */
        }
        .btn-primary a:hover {
          /*background-color: #34495e !important;*/
          border-color: #34495e !important; 
        } 
      }

    </style>

</head>
<body class="">
    <span class="preheader"><?php echo $_SESSION['v_no']; ?></span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">


            <h2>Vehicles Details</h2>
            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">
                    <tr>
                      <td colspan="2">
                        <p>IC Number : <?php echo $result['m_nic'] != ''?$result['m_nic']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <p>Mobile Phone No. : <?php echo $result['m_phone'] != ''?$result['m_phone']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <p>Next Effective Date : <?php echo $result['expire_date'] != ''?$result['expire_date']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <p>No-Claim Discount Rate: 55%</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Vehicle No. : <?php echo $result['v_number'] != ''?$result['v_number']:'Not Available'; ?></p>
                      </td>
                      <td>
                        <p>Chassis No. : <?php echo $result['chassis'] != ''?$result['chassis']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Engine No. : <?php echo $result['engine_no'] != ''?$result['engine_no']:'Not Available'; ?></p>
                      </td>
                      <td>
                        <p>Car Location Postcode : <?php echo $result['postcode'] != ''?$result['postcode']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>NVIC : <?php echo $result['nvic'] != ''?$result['nvic']:'Not Available'; ?></p>
                      </td>
                      <td>
                        <p>Make : <?php echo $result['make'] != ''?$result['make']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Model : <?php echo $result['model'] != ''?$result['model']:'Not Available'; ?></p>
                      </td>
                      <td>
                        <p>Variant : <?php echo $result['variant'] != ''?$result['variant']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Seats : <?php echo $result['seats'] != ''?$result['seats']:'Not Available'; ?></p>
                      </td>
                      <td>
                        <p>Trans : <?php echo $result['trans'] != ''?$result['trans']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>CC : <?php echo $result['cc'] != ''?$result['cc']:'Not Available'; ?></p>
                      </td>
                      <td>
                        <p>Group : <?php echo $result['group'] != ''?$result['group']:'Not Available'; ?></p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p>Make Year : <?php echo $result['year'] != ''?$result['year']:'Not Available'; ?></p>
                      </td>
                    </tr>
            <!-- END MAIN CONTENT AREA -->
            </table>

            <hr>

            <h2>Insurance Details</h2>
            <table role="presentation" class="main">
                <tr>
                    <td>
                        <img src="../uploads/ins/<?php echo $insurance['v_ins_main_img']; ?>">
                    </td>
                    <td><p>Agreed Value Range (<?php echo 'RM. '.$insurance['v_ins_price']; ?>)
          <br>  Sum Insured (SI):</p></td>
                </tr>
                <tr>
                    <td colspan="2"><p><?php echo $insurance['v_ins_short_description']; ?></p></td>
                </tr>
            </table>
            <div>
                <h2>Active Features</h2>
                <ul style="list-style-type:none">
                    <?php while($row = mysqli_fetch_assoc($get_features)):?>
                          <li><?php echo $row['f_number']; ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>