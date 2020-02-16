<?php  
    include "data/all_functions.php";

    $value = $_GET['v_number'];

    $result= getVehicleUsers($value);

?>
<div class="container">
<div style="align-self: center;">
<div class="card">
<div class="card-header" style="background-color: #1a7fb7; color: white; border-bottom: 10px solid rgba(0, 0, 0, 0.125);">
<div class="row">
<div style="padding: 15px 0px 0px 150px;">Information</div>
<div class="col">&nbsp;</div>
</div>
</div>
<div class="collapse show">
<div class="card-body">
<?php if($result != null): ?>
<div class="row">
<div class="col-sm-12 col-12">&nbsp;</div>
<div class="col-sm-12 col-12">&nbsp;</div>
<div class="col-sm-12 col-12">IC Number : <?php echo $result['m_nic'] != ''?$result['m_nic']:'Not Available'; ?></div>
<div class="col-sm-12 col-12">Mobile Phone No. : <?php echo $result['m_phone'] != ''?$result['m_phone']:'Not Available'; ?></div>
</div>
<hr />
<div class="row">
<div class="col-sm-12 col-12">Next Effective Date : <?php echo $result['expire_date'] != ''?$result['expire_date']:'Not Available'; ?></div>
<div class="col-sm-6 col-6">No-Claim Discount Rate: 55%</div>
</div>
<hr />
<div class="row">
    <div class="col-sm-6 col-6">Vehicle No. : <?php echo $result['v_number'] != ''?$result['v_number']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Chassis No. : <?php echo $result['chassis'] != ''?$result['chassis']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Engine No. : <?php echo $result['engine_no'] != ''?$result['engine_no']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Car Location Postcode : <?php echo $result['postcode'] != ''?$result['postcode']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">NVIC : <?php echo $result['nvic'] != ''?$result['nvic']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Make : <?php echo $result['make'] != ''?$result['make']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Model : <?php echo $result['model'] != ''?$result['model']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Variant : <?php echo $result['variant'] != ''?$result['variant']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Seats : <?php echo $result['seats'] != ''?$result['seats']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Trans : <?php echo $result['trans'] != ''?$result['trans']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">CC : <?php echo $result['cc'] != ''?$result['cc']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Group : <?php echo $result['group'] != ''?$result['group']:'Not Available'; ?></div>
    <div class="col-sm-6 col-6">Make Year : <?php echo $result['year'] != ''?$result['year']:'Not Available'; ?></div>

<?php else: ?>
    <div class="col-sm-12 col-12">No Records Found on the Server...</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
</div>